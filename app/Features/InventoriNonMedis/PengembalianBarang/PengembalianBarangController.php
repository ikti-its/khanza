<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Features\InventoriNonMedis\PengembalianBarangDetail\PengembalianBarangDetailModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

final class PengembalianBarangController extends ControllerTemplate
{
    // id sesuai status_pengembalian_barang.csv
    private const STATUS_DRAF              = 1;
    private const STATUS_PROSES_VERIFIKASI = 2;
    private const STATUS_SELESAI           = 3;

    // status_permintaan_barang yang boleh dijadikan sumber pengembalian (6 = Selesai),
    // hanya dibaca oleh permintaan_eligible()
    private const STATUS_PERMINTAAN_ELIGIBLE = [6];

    // tipe_transaksi_stok 2 = Keluar
    private const TIPE_TRANSAKSI_KELUAR = 2;

    public function __construct()
    {
        parent::__construct(
            new PengembalianBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Pengembalian Barang', 'pengembalian_barang'],
            ],
            'Pengembalian Barang',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
                A::DETAIL,
            ],
            [
                [HIDE,      OPTIONAL, I::INDEX,    'id_pengembalian',               'ID'],
                [SHOW,      OPTIONAL, I::READONLY, 'no_pengembalian',               'No. Pengembalian'],
                [SHOW,      REQUIRED, I::DTIME,    'tanggal',                       'Tanggal'],
                // FK di-ekspansi jadi no_permintaan/nama/nama_ruangan/nama_status lewat
                // join model. READONLY (bukan MODAL) supaya halaman Audit, yang merender
                // $this->fields apa adanya, tidak menemui jenis 'modal' — sama seperti
                // PermintaanBarangController. Form memakai view kustom.
                [SHOW,      REQUIRED, I::READONLY, 'id_permintaan',                 'Permintaan Asal'],
                [SHOW,      REQUIRED, I::READONLY, 'petugas',                       'Pemohon'],
                [SHOW,      REQUIRED, I::READONLY, 'master_ruangan',                'Ruangan'],
                [SHOW,      REQUIRED, I::SELECT,   'id_status_pengembalian_barang', 'Status'],
                [FORM_ONLY, REQUIRED, I::TEXT,     'alasan',                        'Alasan'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'petugas_gudang',                'Petugas Gudang'],
                [FORM_ONLY, OPTIONAL, I::DTIME,    'tanggal_verifikasi',            'Tanggal Verifikasi'],
                [FORM_ONLY, OPTIONAL, I::TEXT,     'catatan_verifikasi',            'Catatan Verifikasi'],
            ],
        );
    }

    // data terbaru di atas
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_order('id_pengembalian', 'DESC');
    }

    // narrows the query-result union (bool|Query|BaseResult) that mago infers
    // for ->get()/->query(), matching ModelTemplate::guarded_get() convention.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // ========= DUA METHOD PUSAT =========

    /**
     * Permintaan yang boleh dijadikan sumber pengembalian, terbaru dulu.
     * SATU-SATUNYA tempat aturan eligibilitas: menambah status lain cukup lewat
     * STATUS_PERMINTAAN_ELIGIBLE, batas waktu cukup ditambahkan sebagai where
     * di sini (mis. pada pb.tanggal_diterima).
     *
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function permintaan_eligible(null|int $id_permintaan = null): array
    {
        $builder = $this
            ->get_db()
            ->table('inventori_non_medis.permintaan_barang pb')
            ->join('ruangan.ruangan r', 'pb.master_ruangan = r.id_ruangan', 'left')
            ->select('pb.id_permintaan, pb.no_permintaan, pb.tanggal, pb.master_ruangan, r.nama_ruangan')
            ->whereIn('pb.id_status_permintaan_barang', self::STATUS_PERMINTAAN_ELIGIBLE)
            ->where('pb.id_permintaan >', 0);

        if ($id_permintaan !== null) {
            $builder->where('pb.id_permintaan', $id_permintaan);
        }

        /** @var list<array<string, mixed>> */
        return $this->guarded(
            $builder
                ->orderBy('pb.tanggal', 'DESC')
                ->orderBy('pb.id_permintaan', 'DESC')
                ->get(),
        )->getResultArray();
    }

    /**
     * Sisa kuota pengembalian per barang untuk satu permintaan.
     *
     * @return array<int, int> id_barang => sisa
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function sisa_kuota(int $id_permintaan): array
    {
        $sisa = [];
        foreach ($this->rincian_kuota($id_permintaan) as $row) {
            $sisa[(int) $row['id_barang']] = (int) $row['sisa'];
        }
        return $sisa;
    }

    /**
     * Rumus kuota — hanya ditulis di sini, dipakai sisa_kuota() dan list():
     *   sisa = SUM(qty transaksi_stok tipe Keluar untuk permintaan ini)
     *        - SUM(qty_diverifikasi pengembalian Selesai)
     *        - SUM(qty_diajukan pengembalian Proses Verifikasi)
     * Sumbernya transaksi_stok, BUKAN qty_disetujui: permintaan bisa berstatus
     * Selesai tanpa transaksi keluar sama sekali. Semua transaksi keluar
     * permintaan ini dijumlahkan (persetujuan awal + auto-fulfill). Draf tidak
     * mengurangi kuota; kedua sisi diagregasi per barang lebih dulu supaya join
     * tidak menggandakan angka.
     *
     * @return list<array{id_barang: int, kode_barang: string, nama_barang: string, nama_satuan: string, qty_keluar: int, sudah_dikembalikan: int, sisa: int}>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function rincian_kuota(int $id_permintaan): array
    {
        $rows = $this->guarded($this->get_db()->query(
            '
            WITH keluar AS (
                SELECT tsd.id_barang, SUM(tsd.qty) AS qty_keluar
                FROM inventori_non_medis.transaksi_stok ts
                JOIN inventori_non_medis.transaksi_stok_detail tsd ON tsd.id_transaksi = ts.id_transaksi
                WHERE ts.id_permintaan = ?
                  AND ts.id_tipe_transaksi_stok = ?
                GROUP BY tsd.id_barang
            ), kembali AS (
                SELECT d.id_barang,
                       SUM(CASE p.id_status_pengembalian_barang
                               WHEN ? THEN COALESCE(d.qty_diverifikasi, 0)
                               ELSE d.qty_diajukan
                           END) AS qty_kembali
                FROM inventori_non_medis.pengembalian_barang p
                JOIN inventori_non_medis.pengembalian_barang_detail d ON d.id_pengembalian = p.id_pengembalian
                WHERE p.id_permintaan = ?
                  AND p.id_status_pengembalian_barang IN (?, ?)
                GROUP BY d.id_barang
            )
            SELECT k.id_barang, b.kode_barang, b.nama_barang, s.nama_satuan,
                   k.qty_keluar,
                   COALESCE(r.qty_kembali, 0) AS sudah_dikembalikan,
                   k.qty_keluar - COALESCE(r.qty_kembali, 0) AS sisa
            FROM keluar k
            LEFT JOIN kembali r ON r.id_barang = k.id_barang
            LEFT JOIN inventori_non_medis.barang b ON b.id_barang = k.id_barang
            LEFT JOIN inventori_non_medis.satuan s ON s.id_satuan = b.id_satuan
            ORDER BY b.nama_barang ASC
            ',
            [
                $id_permintaan,
                self::TIPE_TRANSAKSI_KELUAR,
                self::STATUS_SELESAI,
                $id_permintaan,
                self::STATUS_SELESAI,
                self::STATUS_PROSES_VERIFIKASI,
            ],
        ))->getResultArray();

        return array_map(static fn(array $r): array => [
            'id_barang'          => (int) $r['id_barang'],
            'kode_barang'        => (string) ($r['kode_barang'] ?? '-'),
            'nama_barang'        => (string) ($r['nama_barang'] ?? '-'),
            'nama_satuan'        => (string) ($r['nama_satuan'] ?? '-'),
            'qty_keluar'         => (int) $r['qty_keluar'],
            'sudah_dikembalikan' => (int) $r['sudah_dikembalikan'],
            'sisa'               => (int) $r['sisa'],
        ], $rows);
    }

    // ========= ENDPOINT MODAL =========

    /**
     * Endpoint modal/list:
     * - Tanpa param: permintaan eligible (modal pemilihan permintaan)
     * - Dengan ?id_permintaan=X: barang yang masih bisa dikembalikan (sisa > 0)
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function list(): ResponseInterface
    {
        $id_permintaan = (int) ($this->request->getGet('id_permintaan') ?? 0);

        if ($id_permintaan > 0) {
            if ($this->permintaan_eligible($id_permintaan) === []) {
                return $this->response->setJSON(['data' => []]);
            }

            $data = array_values(array_filter(
                $this->rincian_kuota($id_permintaan),
                static fn(array $r): bool => $r['sisa'] > 0,
            ));
            return $this->response->setJSON(['data' => $data]);
        }

        $data = array_map(static fn(array $r): array => [
            'id_permintaan'  => (int) $r['id_permintaan'],
            'no_permintaan'  => (string) ($r['no_permintaan'] ?? '-'),
            'tanggal'        => !empty($r['tanggal']) ? date('d/m/Y, H:i', (int) strtotime((string) $r['tanggal'])) : '-',
            'master_ruangan' => (int) ($r['master_ruangan'] ?? 0),
            'nama_ruangan'   => (string) ($r['nama_ruangan'] ?? '-'),
        ], $this->permintaan_eligible());

        return $this->response->setJSON(['data' => $data]);
    }

    // ========= HALAMAN =========

    // form tambah: 1-page header + detail
    #[\Override]
    public function create_page(): string
    {
        return view('admin/inventorinonmedis/tambah_pengembalian_barang', [
            'judul'       => 'Tambah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Tambah', 'icon' => 'tambah']]),
            'modul_path'  => $this->get_uri_path(),
            'form_action' => '/submittambah/',
        ]);
    }

    // halaman detail (readonly) + tombol Ajukan saat Draf
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function detail(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $baris = $this->model->find_one($id);
        if (!is_array($baris))
            return $this->home();

        return view('admin/inventorinonmedis/detail_pengembalian_barang', [
            'judul'        => 'Detail ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'   => $this->get_uri_path(),
            'baris'        => $baris,
            'detail_items' => $this->get_detail_items((int) $id),
            'kuota'        => $this->kuota_by_barang((int) ($baris['id_permintaan'] ?? 0)),
            'is_draf'      => (int) ($baris['id_status_pengembalian_barang'] ?? 0) === self::STATUS_DRAF,
        ]);
    }

    // form ubah: hanya saat Draf, selain itu tampilkan detail
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    #[\Override]
    public function update_page(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $baris = $this->model->find_one($id);
        if (!is_array($baris))
            return $this->home();

        if ((int) ($baris['id_status_pengembalian_barang'] ?? 0) !== self::STATUS_DRAF) {
            return $this->detail($id);
        }

        return view('admin/inventorinonmedis/tambah_pengembalian_barang', [
            'judul'        => 'Ubah ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'   => $this->get_uri_path(),
            'form_action'  => '/submitedit/' . $id,
            'baris'        => $baris,
            'detail_items' => $this->get_detail_items((int) $id),
            'kuota'        => $this->kuota_by_barang((int) ($baris['id_permintaan'] ?? 0)),
        ]);
    }

    // ========= AKSI =========

    // simpan header + detail sebagai Draf
    /** @throws \CodeIgniter\Files\Exceptions\FileNotFoundException */
    #[\Override]
    public function create(): string|RedirectResponse
    {
        try {
            [$header, $items] = $this->validated_input();
        } catch (\RuntimeException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back();
        }

        $db = $this->get_db();

        try {
            $db->transBegin();

            // Serialkan penomoran supaya dua simpan bersamaan tidak mendapat nomor sama.
            $db->query('SELECT pg_advisory_xact_lock(hashtext(?))', ['inventori_non_medis.no_pengembalian']);

            $header['no_pengembalian']               = $this->next_no_pengembalian((string) $header['tanggal']);
            $header['id_status_pengembalian_barang'] = self::STATUS_DRAF;

            if ($this->model->insert($header) === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()));
            }
            $id_pengembalian = (int) $db->insertID();

            $this->save_detail_items($id_pengembalian, $items);

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menyimpan: ' . $e->getMessage());
            return redirect()->back();
        }

        // Di luar try: data sudah ter-commit, kegagalan di sini tak boleh dilaporkan sebagai gagal simpan.
        session()->setFlashdata(
            'success',
            "Pengembalian {$header['no_pengembalian']} disimpan sebagai Draf. Ajukan dari halaman detail bila sudah lengkap.",
        );
        return $this->home();
    }

    // update header + sync detail (hanya Draf), atau Ajukan bila aksi=ajukan
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (!is_array($current)) {
            session()->setFlashdata('error', 'Data pengembalian tidak ditemukan.');
            return $this->home();
        }

        // Dicek lebih dulu, pola yang sama dengan aksi_pembatalan di
        // PersetujuanPermintaanBarangController::update().
        $aksi = (string) ($this->request->getPost('aksi') ?? '');
        if ($aksi === 'ajukan') {
            return $this->ajukan((int) $id, $current);
        }
        if ($aksi !== '') {
            session()->setFlashdata('error', 'Aksi tidak dikenal.');
            return $this->home();
        }

        if ((int) ($current['id_status_pengembalian_barang'] ?? 0) !== self::STATUS_DRAF) {
            session()->setFlashdata('error', 'Pengembalian yang sudah diajukan tidak dapat diubah.');
            return $this->home();
        }

        try {
            [$header, $items] = $this->validated_input();
        } catch (\RuntimeException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back();
        }

        $db = $this->get_db();

        try {
            $db->transBegin();

            if ($this->model->update($id, $header) === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()));
            }

            // sync detail: hapus semua lalu insert ulang
            $db
                ->table('inventori_non_medis.pengembalian_barang_detail')
                ->where('id_pengembalian', (int) $id)
                ->delete();
            $this->save_detail_items((int) $id, $items);

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal memperbarui: ' . $e->getMessage());
            return redirect()->back();
        }

        session()->setFlashdata('success', 'Data Pengembalian Barang berhasil diperbarui.');
        return $this->home();
    }

    // hapus header + detail sekaligus (hanya Draf)
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (is_array($current) && (int) ($current['id_status_pengembalian_barang'] ?? 0) !== self::STATUS_DRAF) {
            session()->setFlashdata('error', 'Pengembalian yang sudah diajukan tidak dapat dihapus.');
            return $this->home();
        }

        $db = $this->get_db();
        try {
            $db->transBegin();
            $db
                ->table('inventori_non_medis.pengembalian_barang_detail')
                ->where('id_pengembalian', (int) $id)
                ->delete();
            $this->model->delete($id);
            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menghapus: ' . $e->getMessage());
            return $this->home();
        }

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return $this->home();
    }

    /**
     * Ajukan: Draf (1) → Proses Verifikasi (2). Kuota divalidasi ULANG di server
     * di dalam transaksi, dengan kunci per permintaan supaya dua draf dari
     * permintaan yang sama tidak lolos bersamaan melampaui sisa.
     *
     * @param array<string, mixed> $current
     */
    private function ajukan(int $id, array $current): RedirectResponse
    {
        if ((int) ($current['id_status_pengembalian_barang'] ?? 0) !== self::STATUS_DRAF) {
            session()->setFlashdata('error', 'Hanya pengembalian berstatus Draf yang dapat diajukan.');
            return $this->home();
        }

        $id_permintaan = (int) ($current['id_permintaan'] ?? 0);
        $db            = $this->get_db();

        try {
            $db->transBegin();
            $db->query('SELECT pg_advisory_xact_lock(hashtext(?))', [
                'inventori_non_medis.pengembalian_barang:permintaan:' . $id_permintaan,
            ]);

            $items = [];
            foreach ($this->get_detail_items($id) as $row) {
                $items[] = [
                    'id_barang' => (int) $row['id_barang'],
                    'qty'       => (int) $row['qty_diajukan'],
                ];
            }
            if ($items === []) {
                throw new \RuntimeException('Tambahkan minimal satu barang sebelum mengajukan pengembalian.');
            }

            if ($this->permintaan_eligible($id_permintaan) === []) {
                throw new \RuntimeException('Permintaan asal tidak lagi memenuhi syarat untuk pengembalian.');
            }

            $error = $this->validate_kuota($items, $id_permintaan);
            if ($error !== null) {
                throw new \RuntimeException($error);
            }

            if ($this->model->update($id, ['id_status_pengembalian_barang' => self::STATUS_PROSES_VERIFIKASI]) === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()));
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal mengajukan: ' . $e->getMessage());
            return redirect()->back();
        }

        session()->setFlashdata('success', 'Pengembalian diajukan, menunggu verifikasi petugas gudang.');
        return $this->home();
    }

    // ========= PRIVATE HELPERS =========

    /**
     * Baca & validasi input form tambah/ubah. master_ruangan diambil dari
     * permintaan asal di server, bukan dari POST.
     *
     * @return array{0: array<string, mixed>, 1: list<array{id_barang: int, qty: int, catatan: string|null}>}
     * @throws \RuntimeException pesan validasi untuk pengguna
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function validated_input(): array
    {
        $tanggal       = trim((string) ($this->request->getPost('tanggal') ?? ''));
        $petugas       = (int) ($this->request->getPost('petugas') ?? 0);
        $id_permintaan = (int) ($this->request->getPost('id_permintaan') ?? 0);
        $alasan        = trim((string) ($this->request->getPost('alasan') ?? ''));

        if ($tanggal === '' || strtotime($tanggal) === false) {
            throw new \RuntimeException('Tanggal pengembalian wajib diisi.');
        }
        if ($petugas <= 0) {
            throw new \RuntimeException('Pemohon wajib diisi.');
        }
        if ($alasan === '') {
            throw new \RuntimeException('Alasan pengembalian wajib diisi.');
        }

        $permintaan = $id_permintaan > 0 ? $this->permintaan_eligible($id_permintaan) : [];
        if ($permintaan === []) {
            throw new \RuntimeException('Pilih permintaan asal yang memenuhi syarat pengembalian.');
        }

        $items = $this->read_detail_items();
        $error = $this->validate_kuota($items, $id_permintaan);
        if ($error !== null) {
            throw new \RuntimeException($error);
        }

        return [
            [
                'tanggal'        => $tanggal,
                'petugas'        => $petugas,
                'id_permintaan'  => $id_permintaan,
                'master_ruangan' => (int) $permintaan[0]['master_ruangan'],
                'alasan'         => $alasan,
            ],
            $items,
        ];
    }

    /**
     * @return list<array{id_barang: int, qty: int, catatan: string|null}>
     * @throws \RuntimeException
     */
    private function read_detail_items(): array
    {
        $ids = (array) ($this->request->getPost('detail_id_barang') ?? []);
        $qty = (array) ($this->request->getPost('detail_qty') ?? []);
        $cat = (array) ($this->request->getPost('detail_catatan') ?? []);

        $items = [];
        $seen  = [];
        for ($i = 0; $i < count($ids); $i++) {
            $id_barang = (int) ($ids[$i] ?? 0);
            if ($id_barang <= 0)
                continue;

            if (isset($seen[$id_barang])) {
                throw new \RuntimeException('Barang yang sama tidak boleh muncul dua kali dalam satu pengembalian.');
            }
            $seen[$id_barang] = true;

            $catatan = trim((string) ($cat[$i] ?? ''));
            $items[] = [
                'id_barang' => $id_barang,
                'qty'       => (int) ($qty[$i] ?? 0),
                'catatan'   => $catatan !== '' ? $catatan : null,
            ];
        }
        return $items;
    }

    /**
     * Cek setiap baris terhadap sisa_kuota(). Mengembalikan pesan error pertama,
     * atau null bila semua valid. Qty per barang dijumlahkan lebih dulu.
     *
     * @param list<array{id_barang: int, qty: int}> $items
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function validate_kuota(array $items, int $id_permintaan): null|string
    {
        if ($items === [])
            return null;

        $total = [];
        foreach ($items as $item) {
            if ($item['qty'] <= 0) {
                return 'Qty diajukan harus lebih dari 0.';
            }
            $total[$item['id_barang']] = ($total[$item['id_barang']] ?? 0) + $item['qty'];
        }

        $sisa  = $this->sisa_kuota($id_permintaan);
        $names = $this->nama_barang(array_keys($total));
        foreach ($total as $id_barang => $qty) {
            $nama = $names[$id_barang] ?? "ID {$id_barang}";
            if (!array_key_exists($id_barang, $sisa)) {
                return "Barang \"{$nama}\" tidak pernah dikeluarkan untuk permintaan ini.";
            }
            if ($qty > $sisa[$id_barang]) {
                return "Qty \"{$nama}\" ({$qty}) melebihi sisa yang bisa dikembalikan ({$sisa[$id_barang]}).";
            }
        }
        return null;
    }

    /**
     * @param list<int> $ids
     * @return array<int, string>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function nama_barang(array $ids): array
    {
        if ($ids === [])
            return [];

        $rows = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.barang')
                ->select('id_barang, nama_barang')
                ->whereIn('id_barang', $ids)
                ->get(),
        )->getResultArray();

        $map = [];
        foreach ($rows as $r) {
            $map[(int) $r['id_barang']] = (string) $r['nama_barang'];
        }
        return $map;
    }

    /**
     * rincian_kuota() diindeks per id_barang, untuk view (kolom Qty Keluar/Sisa).
     *
     * @return array<int, array<string, int|string>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function kuota_by_barang(int $id_permintaan): array
    {
        if ($id_permintaan <= 0)
            return [];

        $map = [];
        foreach ($this->rincian_kuota($id_permintaan) as $row) {
            $map[$row['id_barang']] = $row;
        }
        return $map;
    }

    /**
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function get_detail_items(int $id_pengembalian): array
    {
        /** @var list<array<string, mixed>> */
        return $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.pengembalian_barang_detail d')
                ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
                ->select(
                    'd.id_detail, d.id_barang, d.qty_diajukan, d.qty_diverifikasi, d.catatan, b.kode_barang, b.nama_barang, s.nama_satuan',
                )
                ->where('d.id_pengembalian', $id_pengembalian)
                ->orderBy('b.nama_barang', 'ASC')
                ->get(),
        )->getResultArray();
    }

    /**
     * @param list<array{id_barang: int, qty: int, catatan: string|null}> $items
     * @throws \RuntimeException
     * @throws \ReflectionException
     */
    private function save_detail_items(int $id_pengembalian, array $items): void
    {
        $detail_model = new PengembalianBarangDetailModel();
        foreach ($items as $item) {
            $ok = $detail_model->insert([
                'id_pengembalian' => $id_pengembalian,
                'id_barang'       => $item['id_barang'],
                'qty_diajukan'    => $item['qty'],
                'catatan'         => $item['catatan'],
            ]);
            if ($ok === false) {
                throw new \RuntimeException(implode(' ', $detail_model->errors()));
            }
        }
    }

    /**
     * Nomor berikutnya diambil dari nomor TERBESAR dengan prefix tanggal yang
     * sama — bukan get_last() (baris ber-PK terbesar), yang bisa memberi nomor
     * dari tanggal lain dan membuat penomoran mulai ulang dari 0001.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    private function next_no_pengembalian(string $tanggal): string
    {
        helper('autonomor');
        $prefix = 'KMB' . date('Ymd', (int) strtotime($tanggal));

        $row = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.pengembalian_barang')
                ->selectMax('no_pengembalian', 'last_no')
                ->like('no_pengembalian', $prefix, 'after')
                ->get(),
        )->getRowArray();

        $last = $row['last_no'] ?? null;
        return generateNextNoPengembalianBarang(is_string($last) ? $last : null, $tanggal);
    }
}

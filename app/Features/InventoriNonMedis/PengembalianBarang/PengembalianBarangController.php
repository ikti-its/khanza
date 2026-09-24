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
                // TANPA A::DETAIL: 'Lihat Detail' datang dari fallback aksi.php yang saling
                // meniadakan dengan Ubah/Hapus (Draf → Ubah+Hapus, lainnya → Lihat Detail),
                // sama seperti Permintaan Barang.
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
                [FORM_ONLY, OPTIONAL, I::DTIME,    'tanggal_verifikasi',            'Tanggal Persetujuan'],
                [FORM_ONLY, OPTIONAL, I::TEXT,     'catatan_verifikasi',            'Catatan Persetujuan'],
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

    // Eligibilitas, rumus kuota, dan kunci per permintaan dipakai bersama F14 &
    // detail Permintaan — lihat PengembalianBarangService.
    private function service(): PengembalianBarangService
    {
        return new PengembalianBarangService($this->get_db());
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
            if ($this->service()->permintaan_eligible($id_permintaan) === []) {
                return $this->response->setJSON(['data' => []]);
            }

            $data = array_values(array_filter(
                $this->service()->rincian_kuota($id_permintaan),
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
        ], $this->service()->permintaan_dapat_dikembalikan()); // hanya yang masih punya sisa kuota

        return $this->response->setJSON(['data' => $data]);
    }

    // ========= HALAMAN =========

    // form tambah: 1-page header + detail. ?id_permintaan=X (dari tombol "Ajukan
    // Pengembalian" di detail Permintaan) mengisi permintaan asal bila eligible.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function create_page(): string
    {
        $prefill       = [];
        $id_permintaan = (int) ($this->request->getGet('id_permintaan') ?? 0);
        if ($id_permintaan > 0) {
            // aturan sama dengan tombol di detail Permintaan & modal pemilihan permintaan
            $permintaan = $this->service()->permintaan_dapat_dikembalikan($id_permintaan);
            if ($permintaan !== []) {
                $prefill = [
                    'id_permintaan' => $permintaan[0]['id_permintaan'],
                    'no_permintaan' => $permintaan[0]['no_permintaan'],
                    'nama_ruangan'  => $permintaan[0]['nama_ruangan'],
                ];
            }
        }

        return view('admin/inventorinonmedis/tambah_pengembalian_barang', [
            'judul'       => 'Tambah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Tambah', 'icon' => 'tambah']]),
            'modul_path'  => $this->get_uri_path(),
            'form_action' => '/submittambah/',
            'baris'       => $prefill,
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
            'detail_items' => $this->service()->detail_items((int) $id),
            'kuota'        => $this->kuota_by_barang((int) ($baris['id_permintaan'] ?? 0)),
            'is_draf'      => (int) ($baris['id_status_pengembalian_barang'] ?? 0) === PengembalianBarangService::STATUS_DRAF,
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

        if ((int) ($baris['id_status_pengembalian_barang'] ?? 0) !== PengembalianBarangService::STATUS_DRAF) {
            return $this->detail($id);
        }

        return view('admin/inventorinonmedis/tambah_pengembalian_barang', [
            'judul'        => 'Ubah ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'   => $this->get_uri_path(),
            'form_action'  => '/submitedit/' . $id,
            'baris'        => $baris,
            'detail_items' => $this->service()->detail_items((int) $id),
            'kuota'        => $this->kuota_by_barang((int) ($baris['id_permintaan'] ?? 0)),
        ]);
    }

    // ========= AKSI =========

    // simpan header + detail; Status di form = Draf atau langsung Proses Pengembalian
    // (pola Permintaan Barang: Draf / Proses Permintaan dipilih di form)
    /** @throws \CodeIgniter\Files\Exceptions\FileNotFoundException */
    #[\Override]
    public function create(): string|RedirectResponse
    {
        $ajukan = $this->status_tujuan() === PengembalianBarangService::STATUS_PROSES_PENGEMBALIAN;

        try {
            [$header, $items] = $this->validated_input();
        } catch (\RuntimeException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back();
        }

        $db = $this->get_db();

        try {
            // Error DB di dalam transaksi TIDAK dilempar oleh CI4 secara bawaan
            // (query hanya mengembalikan false) — aktifkan supaya catch di bawah menangkapnya.
            $db->transException(true)->transBegin();

            // Serialkan penomoran supaya dua simpan bersamaan tidak mendapat nomor sama.
            $db->query('SELECT pg_advisory_xact_lock(hashtext(?))', ['inventori_non_medis.no_pengembalian']);

            $header['no_pengembalian']               = $this->next_no_pengembalian((string) $header['tanggal']);
            $header['id_status_pengembalian_barang'] = PengembalianBarangService::STATUS_DRAF;

            if ($this->model->insert($header) === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()) ?: 'Gagal memperbarui dokumen pengembalian.');
            }
            $id_pengembalian = (int) $db->insertID();

            $this->save_detail_items($id_pengembalian, $items);

            if ($ajukan) {
                $this->ajukan_dalam_transaksi($id_pengembalian, (int) $header['id_permintaan']);
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menyimpan: ' . $e->getMessage());
            return redirect()->back();
        } finally {
            $db->transException(false);
        }

        // Di luar try: data sudah ter-commit, kegagalan di sini tak boleh dilaporkan sebagai gagal simpan.
        session()->setFlashdata(
            'success',
            $ajukan
                ? "Pengembalian {$header['no_pengembalian']} diajukan, menunggu persetujuan staf gudang."
                : "Pengembalian {$header['no_pengembalian']} disimpan sebagai Draf.",
        );
        return $this->home();
    }

    // update header + sync detail (hanya Draf); Status di form bisa langsung Proses
    // Pengembalian (satu-satunya jalan untuk mengajukan, lihat ajukan_dalam_transaksi()).
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (!is_array($current)) {
            session()->setFlashdata('error', 'Data pengembalian tidak ditemukan.');
            return $this->home();
        }

        // Form F13 tidak mengirim 'aksi'. Muatan apa pun (termasuk aksi=ajukan lama)
        // ditolak eksplisit, bukan diam-diam diperlakukan sebagai update biasa.
        $aksi = (string) ($this->request->getPost('aksi') ?? '');
        if ($aksi !== '') {
            session()->setFlashdata('error', 'Aksi tidak dikenal.');
            return $this->home();
        }

        if ((int) ($current['id_status_pengembalian_barang'] ?? 0) !== PengembalianBarangService::STATUS_DRAF) {
            session()->setFlashdata('error', 'Pengembalian yang sudah diajukan tidak dapat diubah.');
            return $this->home();
        }

        $ajukan = $this->status_tujuan() === PengembalianBarangService::STATUS_PROSES_PENGEMBALIAN;

        try {
            [$header, $items] = $this->validated_input();
        } catch (\RuntimeException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back();
        }

        $db = $this->get_db();

        try {
            // Error DB di dalam transaksi TIDAK dilempar oleh CI4 secara bawaan
            // (query hanya mengembalikan false) — aktifkan supaya catch di bawah menangkapnya.
            $db->transException(true)->transBegin();

            if ($this->model->update($id, $header) === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()) ?: 'Gagal memperbarui dokumen pengembalian.');
            }

            // sync detail: hapus semua lalu insert ulang
            $db
                ->table('inventori_non_medis.pengembalian_barang_detail')
                ->where('id_pengembalian', (int) $id)
                ->delete();
            $this->save_detail_items((int) $id, $items);

            if ($ajukan) {
                $this->ajukan_dalam_transaksi((int) $id, (int) $header['id_permintaan']);
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal memperbarui: ' . $e->getMessage());
            return redirect()->back();
        } finally {
            $db->transException(false);
        }

        session()->setFlashdata(
            'success',
            $ajukan ? 'Pengembalian diajukan, menunggu persetujuan staf gudang.' : 'Data Pengembalian Barang berhasil diperbarui.',
        );
        return $this->home();
    }

    // hapus header + detail sekaligus (hanya Draf)
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (is_array($current) && (int) ($current['id_status_pengembalian_barang'] ?? 0) !== PengembalianBarangService::STATUS_DRAF) {
            session()->setFlashdata('error', 'Pengembalian yang sudah diajukan tidak dapat dihapus.');
            return $this->home();
        }

        $db = $this->get_db();
        try {
            // Error DB di dalam transaksi TIDAK dilempar oleh CI4 secara bawaan
            // (query hanya mengembalikan false) — aktifkan supaya catch di bawah menangkapnya.
            $db->transException(true)->transBegin();
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
        } finally {
            $db->transException(false);
        }

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return $this->home();
    }

    /**
     * Draf → Proses Pengembalian. WAJIB dipanggil di dalam transaksi pemanggil
     * (create/update). Kunci per permintaan (sama dengan Persetujuan F14),
     * lalu validasi ulang di dalam kunci: minimal satu barang, permintaan masih
     * eligible, dan kuota cukup. Melempar RuntimeException bila gagal.
     *
     * @throws \RuntimeException
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function ajukan_dalam_transaksi(int $id, int $id_permintaan): void
    {
        $this->service()->lock_permintaan($id_permintaan);

        $items = [];
        foreach ($this->service()->detail_items($id) as $row) {
            $items[] = [
                'id_barang' => (int) $row['id_barang'],
                'qty'       => (int) $row['qty_diajukan'],
            ];
        }
        if ($items === []) {
            throw new \RuntimeException('Tambahkan minimal satu barang sebelum mengajukan pengembalian.');
        }

        if ($this->service()->permintaan_eligible($id_permintaan) === []) {
            throw new \RuntimeException('Permintaan asal tidak lagi memenuhi syarat untuk pengembalian.');
        }

        $error = $this->validate_kuota($items, $id_permintaan);
        if ($error !== null) {
            throw new \RuntimeException($error);
        }

        if ($this->model->update($id, ['id_status_pengembalian_barang' => PengembalianBarangService::STATUS_PROSES_PENGEMBALIAN]) === false) {
            throw new \RuntimeException(implode(' ', $this->model->errors()) ?: 'Gagal memperbarui dokumen pengembalian.');
        }
    }

    // Status tujuan dari form: hanya Draf (1) atau Proses Pengembalian (2).
    private function status_tujuan(): int
    {
        return (int) ($this->request->getPost('id_status_pengembalian_barang') ?? 0) === PengembalianBarangService::STATUS_PROSES_PENGEMBALIAN
            ? PengembalianBarangService::STATUS_PROSES_PENGEMBALIAN
            : PengembalianBarangService::STATUS_DRAF;
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

        $permintaan = $id_permintaan > 0 ? $this->service()->permintaan_eligible($id_permintaan) : [];
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

        $sisa  = $this->service()->sisa_kuota($id_permintaan);
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
        foreach ($this->service()->rincian_kuota($id_permintaan) as $row) {
            $map[$row['id_barang']] = $row;
        }
        return $map;
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

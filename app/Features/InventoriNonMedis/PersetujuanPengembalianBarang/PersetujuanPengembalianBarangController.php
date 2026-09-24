<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PersetujuanPengembalianBarang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Features\InventoriNonMedis\PengembalianBarang\PengembalianBarangService as S;
use CodeIgniter\HTTP\RedirectResponse;

final class PersetujuanPengembalianBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PersetujuanPengembalianBarangModel(),
            [
                ['Inventori Non Medis',            'inventori_non_medis'],
                ['Persetujuan Pengembalian Barang', 'persetujuan_pengembalian_barang'],
            ],
            'Persetujuan Pengembalian Barang',
            [
                A::READ,
                A::UPDATE,
                A::AUDIT,
                // TANPA A::DETAIL: status 2 → Ubah, sudah diputuskan → 'Lihat Detail' (fallback
                // aksi.php), sama seperti Persetujuan Permintaan Barang.
            ],
            [
                [HIDE,      OPTIONAL, I::INDEX,    'id_pengembalian',               'ID'],
                [SHOW,      OPTIONAL, I::READONLY, 'no_pengembalian',               'No. Pengembalian'],
                [SHOW,      OPTIONAL, I::DTIME,    'tanggal',                       'Tanggal'],
                [SHOW,      OPTIONAL, I::READONLY, 'id_permintaan',                 'Permintaan Asal'],
                [SHOW,      OPTIONAL, I::READONLY, 'petugas',                       'Pemohon'],
                [SHOW,      OPTIONAL, I::READONLY, 'master_ruangan',                'Ruangan'],
                [SHOW,      OPTIONAL, I::SELECT,   'id_status_pengembalian_barang', 'Status'],
                [FORM_ONLY, OPTIONAL, I::TEXT,     'alasan',                        'Alasan'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'petugas_gudang',                'Petugas Gudang'],
                [FORM_ONLY, OPTIONAL, I::DTIME,    'tanggal_verifikasi',            'Tanggal Persetujuan'],
                [FORM_ONLY, OPTIONAL, I::TEXT,     'catatan_verifikasi',            'Catatan Persetujuan'],
            ],
        );
    }

    // Draf milik unit tidak terlihat gudang. Proses Pengembalian (2) di atas,
    // lalu yang sudah diputuskan (3 Selesai, 4 Ditolak), terbaru dulu.
    // Prefix 'm.' wajib: tabel status yang di-join punya kolom bernama sama,
    // dan ModelTemplate::findAll() memasang orderBy tanpa alias.
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_filter('id_status_pengembalian_barang', [
            S::STATUS_PROSES_PENGEMBALIAN,
            S::STATUS_SELESAI,
            S::STATUS_DITOLAK,
        ]);
        $this->model->set_order('m.id_status_pengembalian_barang', 'ASC');
        $this->model->set_order('m.id_pengembalian', 'DESC');
    }

    // narrows the query-result union (bool|Query|BaseResult) that mago infers
    // for ->get()/->query(), matching ModelTemplate::guarded_get() convention.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    private function service(): S
    {
        return new S($this->get_db());
    }

    // ========= HALAMAN =========

    // halaman baca: untuk dokumen yang sudah diputuskan (juga dipakai status 2)
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function detail(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $baris = $this->model->find_one($id);
        if (!is_array($baris) || (int) ($baris['id_status_pengembalian_barang'] ?? 0) === S::STATUS_DRAF)
            return $this->home();

        $transaksi = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.transaksi_stok')
                ->select('id_transaksi, tanggal')
                ->where('id_pengembalian', (int) $id)
                ->where('id_tipe_transaksi_stok', S::TIPE_TRANSAKSI_PENGEMBALIAN)
                ->get(),
        )->getRowArray();

        return view('admin/inventorinonmedis/detail_persetujuan_pengembalian_barang', [
            'judul'        => 'Detail ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'   => $this->get_uri_path(),
            'baris'        => $baris,
            'detail_items' => $this->service()->detail_items((int) $id),
            'transaksi'    => $transaksi,
        ]);
    }

    // form persetujuan: hanya saat Proses Pengembalian (status 2), selain itu tampilkan detail
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

        if ((int) ($baris['id_status_pengembalian_barang'] ?? 0) !== S::STATUS_PROSES_PENGEMBALIAN) {
            return $this->detail($id);
        }

        return view('admin/inventorinonmedis/ubah_persetujuan_pengembalian_barang', [
            'judul'        => 'Ubah ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'   => $this->get_uri_path(),
            'form_action'  => '/submitedit/' . $id,
            'baris'        => $baris,
            'detail_items' => $this->service()->detail_items((int) $id),
        ]);
    }

    // ========= AKSI =========

    // Hanya dua aksi sah lewat submitedit: aksi=setuju (F14-2) dan aksi=tolak (F14-3),
    // pola setuju/tolak yang sama dengan keputusan pembatalan permintaan.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        $aksi           = (string) ($this->request->getPost('aksi') ?? '');
        $petugas_gudang = (int) ($this->request->getPost('petugas_gudang') ?? 0);
        $catatan        = trim((string) ($this->request->getPost('catatan_verifikasi') ?? ''));

        if (!in_array($aksi, ['setuju', 'tolak'], true)) {
            session()->setFlashdata('error', 'Aksi tidak dikenal.');
            return $this->home();
        }
        if ($petugas_gudang <= 0) {
            session()->setFlashdata('error', 'Petugas gudang wajib diisi.');
            return redirect()->back();
        }

        if ($aksi === 'tolak') {
            return $this->tolak((int) $id, $petugas_gudang, $catatan, false);
        }
        return $this->setuju((int) $id, $petugas_gudang, $catatan);
    }

    /**
     * F14-2 Setujui: posting stok masuk dari pengembalian. Transaksi stok, penambahan
     * stok, qty_diverifikasi, dan status header ditulis dalam SATU transaksi.
     */
    private function setuju(int $id, int $petugas_gudang, string $catatan): RedirectResponse
    {
        try {
            $qty_input = $this->read_qty_diverifikasi();
        } catch (\RuntimeException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back();
        }

        // Semua baris 0 = tidak ada barang yang diterima: perlakukan sebagai
        // penolakan (status 4), bukan Selesai dengan nol barang masuk.
        if ($qty_input !== [] && array_sum($qty_input) === 0) {
            return $this->tolak($id, $petugas_gudang, $catatan, true);
        }

        $db      = $this->get_db();
        $service = $this->service();

        try {
            // Error DB di dalam transaksi TIDAK dilempar oleh CI4 secara bawaan
            // (query hanya mengembalikan false) — aktifkan supaya catch di bawah menangkapnya.
            $db->transException(true)->transBegin();

            $header = $this->locked_header($id, $service);
            $items  = $service->detail_items($id);
            if ($items === []) {
                throw new \RuntimeException('Dokumen pengembalian tidak memiliki baris barang.');
            }

            // Setiap baris dokumen wajib punya input; tidak boleh ada baris asing.
            $ids_dokumen = array_map(static fn(array $r): int => (int) $r['id_detail'], $items);
            if (array_diff(array_keys($qty_input), $ids_dokumen) !== []) {
                throw new \RuntimeException('Terdapat baris yang bukan milik dokumen ini.');
            }

            $diajukan_per_barang = [];
            $verif_per_barang    = [];
            foreach ($items as $item) {
                $id_detail = (int) $item['id_detail'];
                if (!array_key_exists($id_detail, $qty_input)) {
                    throw new \RuntimeException('Qty disetujui wajib diisi untuk semua baris.');
                }
                $qty      = $qty_input[$id_detail];
                $diajukan = (int) $item['qty_diajukan'];
                if ($qty > $diajukan) {
                    throw new \RuntimeException(
                        "Qty disetujui \"{$item['nama_barang']}\" ({$qty}) melebihi qty diajukan ({$diajukan}).",
                    );
                }
                $id_barang                        = (int) $item['id_barang'];
                $diajukan_per_barang[$id_barang] = ($diajukan_per_barang[$id_barang] ?? 0) + $diajukan;
                $verif_per_barang[$id_barang]    = ($verif_per_barang[$id_barang] ?? 0) + $qty;
            }
            if (array_sum($verif_per_barang) === 0) {
                throw new \RuntimeException('Semua qty disetujui 0 — gunakan Tolak.');
            }

            // Validasi ULANG kuota. Dokumen ini berstatus 2 sehingga qty_diajukan-nya
            // sudah terpotong di sisa_kuota(); kapasitas untuknya = sisa + qty_diajukan
            // sendiri. Ini menangkap kuota yang sudah tidak konsisten (mis. sisa negatif).
            $id_permintaan = (int) $header['id_permintaan'];
            $sisa          = $service->sisa_kuota($id_permintaan);
            foreach ($verif_per_barang as $id_barang => $qty) {
                if (!array_key_exists($id_barang, $sisa)) {
                    throw new \RuntimeException("Barang ID {$id_barang} tidak pernah dikeluarkan untuk permintaan asal.");
                }
                $kapasitas = $sisa[$id_barang] + $diajukan_per_barang[$id_barang];
                if ($qty > $kapasitas) {
                    throw new \RuntimeException(
                        "Qty disetujui barang ID {$id_barang} ({$qty}) melebihi kuota yang tersedia ({$kapasitas}).",
                    );
                }
            }

            // 1. header transaksi stok tipe Pengembalian — id_permintaan/penerimaan/opname dibiarkan NULL
            $db->table('inventori_non_medis.transaksi_stok')->insert([
                'id_tipe_transaksi_stok' => S::TIPE_TRANSAKSI_PENGEMBALIAN,
                'tanggal'                => date('Y-m-d H:i:s'),
                'id_pengembalian'        => $id,
                'keterangan'             => $this->keterangan($id, $petugas_gudang),
            ]);
            $id_transaksi = (int) $db->insertID();
            if ($id_transaksi <= 0) {
                throw new \RuntimeException('Gagal membuat transaksi stok.');
            }

            foreach ($items as $item) {
                $id_detail = (int) $item['id_detail'];
                $qty       = $qty_input[$id_detail];

                if ($qty > 0) {
                    $id_barang    = (int) $item['id_barang'];
                    $stok_sebelum = $this->stok_barang($id_barang);

                    // 2. detail transaksi, harga dari transaksi keluar asal (bukan master)
                    $db->table('inventori_non_medis.transaksi_stok_detail')->insert([
                        'id_transaksi' => $id_transaksi,
                        'id_barang'    => $id_barang,
                        'qty'          => $qty,
                        'harga_satuan' => $this->harga_keluar_asal($id_permintaan, $id_barang),
                        'stok_sebelum' => $stok_sebelum,
                        'stok_sesudah' => $stok_sebelum + $qty,
                    ]);

                    // 3. stok bertambah (relatif). harga_satuan master SENGAJA tidak
                    //    disentuh: pengembalian bukan pembelian baru.
                    $db
                        ->table('inventori_non_medis.barang')
                        ->where('id_barang', $id_barang)
                        ->set('stok', 'stok + ' . $qty, false)
                        ->update();
                }

                $db
                    ->table('inventori_non_medis.pengembalian_barang_detail')
                    ->where('id_detail', $id_detail)
                    ->update(['qty_diverifikasi' => $qty]);
            }

            // 4. header dokumen
            $ok = $this->model->update($id, [
                'id_status_pengembalian_barang' => S::STATUS_SELESAI,
                'petugas_gudang'                => $petugas_gudang,
                'tanggal_verifikasi'            => date('Y-m-d H:i:s'),
                'catatan_verifikasi'            => $catatan !== '' ? $catatan : null,
            ]);
            if ($ok === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()) ?: 'Gagal memperbarui dokumen pengembalian.');
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menyetujui: ' . $e->getMessage());
            return redirect()->back();
        } finally {
            $db->transException(false);
        }

        session()->setFlashdata(
            'success',
            'Pengembalian disetujui, ' . array_sum($qty_input) . ' unit masuk ke stok gudang.',
        );
        return $this->home();
    }

    /**
     * F14-3 Tolak. Tidak ada transaksi stok; kuota kembali tersedia karena
     * sisa_kuota() hanya menghitung status 2 dan 3.
     */
    private function tolak(int $id, int $petugas_gudang, string $catatan, bool $dari_semua_nol): RedirectResponse
    {
        if ($catatan === '') {
            session()->setFlashdata(
                'error',
                $dari_semua_nol
                    ? 'Semua qty disetujui 0 berarti pengembalian ditolak. Isi Catatan Persetujuan sebagai alasan penolakan.'
                    : 'Alasan penolakan wajib diisi pada Catatan Persetujuan.',
            );
            return redirect()->back();
        }

        $db = $this->get_db();

        try {
            // Error DB di dalam transaksi TIDAK dilempar oleh CI4 secara bawaan
            // (query hanya mengembalikan false) — aktifkan supaya catch di bawah menangkapnya.
            $db->transException(true)->transBegin();

            $this->locked_header($id, $this->service());

            $ok = $this->model->update($id, [
                'id_status_pengembalian_barang' => S::STATUS_DITOLAK,
                'petugas_gudang'                => $petugas_gudang,
                'tanggal_verifikasi'            => date('Y-m-d H:i:s'),
                'catatan_verifikasi'            => $catatan,
            ]);
            if ($ok === false) {
                throw new \RuntimeException(implode(' ', $this->model->errors()) ?: 'Gagal memperbarui dokumen pengembalian.');
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menolak: ' . $e->getMessage());
            return redirect()->back();
        } finally {
            $db->transException(false);
        }

        session()->setFlashdata(
            'success',
            $dari_semua_nol
                ? 'Semua qty disetujui 0: pengembalian dicatat sebagai Ditolak, stok tidak berubah.'
                : 'Pengembalian ditolak, stok tidak berubah.',
        );
        return $this->home();
    }

    // ========= PRIVATE HELPERS =========

    /**
     * Kunci per permintaan (kunci yang sama dengan Ajukan di F13), lalu baca ulang
     * header DI DALAM kunci: dua keputusan bersamaan atas dokumen yang sama tidak
     * bisa sama-sama lolos.
     *
     * @return array<string, mixed>
     * @throws \RuntimeException
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function locked_header(int $id, S $service): array
    {
        $header = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.pengembalian_barang')
                ->select('id_pengembalian, id_permintaan')
                ->where('id_pengembalian', $id)
                ->get(),
        )->getRowArray();
        if (!is_array($header)) {
            throw new \RuntimeException('Dokumen pengembalian tidak ditemukan.');
        }

        $service->lock_permintaan((int) $header['id_permintaan']);

        $status = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.pengembalian_barang')
                ->select('id_status_pengembalian_barang')
                ->where('id_pengembalian', $id)
                ->get(),
        )->getRowArray();
        if ((int) ($status['id_status_pengembalian_barang'] ?? 0) !== S::STATUS_PROSES_PENGEMBALIAN) {
            throw new \RuntimeException('Hanya pengembalian berstatus Proses Pengembalian yang dapat diputuskan.');
        }

        return $header;
    }

    /**
     * id_detail => qty_diverifikasi dari form. Tiap nilai wajib bilangan bulat >= 0.
     *
     * @return array<int, int>
     * @throws \RuntimeException
     */
    private function read_qty_diverifikasi(): array
    {
        $ids = (array) ($this->request->getPost('detail_id_detail') ?? []);
        $qty = (array) ($this->request->getPost('detail_qty_diverifikasi') ?? []);

        $map = [];
        for ($i = 0; $i < count($ids); $i++) {
            $id_detail = (int) ($ids[$i] ?? 0);
            if ($id_detail <= 0)
                continue;

            $raw = trim((string) ($qty[$i] ?? ''));
            if ($raw === '' || !ctype_digit($raw)) {
                throw new \RuntimeException('Qty disetujui harus bilangan bulat 0 atau lebih.');
            }
            $map[$id_detail] = (int) $raw;
        }

        if ($map === []) {
            throw new \RuntimeException('Qty disetujui wajib diisi untuk semua baris.');
        }
        return $map;
    }

    /**
     * Harga satuan dari transaksi keluar asal barang ini (tipe Keluar untuk
     * permintaan asal). Bila keluar beberapa kali dengan harga berbeda, dipakai
     * transaksi keluar TERAKHIR yang punya harga. Null bila tak ketemu — sengaja
     * TIDAK jatuh ke barang.harga_satuan.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function harga_keluar_asal(int $id_permintaan, int $id_barang): mixed
    {
        $row = $this->guarded($this->get_db()->query(
            '
            SELECT tsd.harga_satuan
            FROM inventori_non_medis.transaksi_stok ts
            JOIN inventori_non_medis.transaksi_stok_detail tsd ON tsd.id_transaksi = ts.id_transaksi
            WHERE ts.id_permintaan = ?
              AND ts.id_tipe_transaksi_stok = ?
              AND tsd.id_barang = ?
              AND tsd.harga_satuan IS NOT NULL
            ORDER BY ts.tanggal DESC, ts.id_transaksi DESC
            LIMIT 1
            ',
            [$id_permintaan, S::TIPE_TRANSAKSI_KELUAR, $id_barang],
        ))->getRowArray();

        return is_array($row) ? $row['harga_satuan'] : null;
    }

    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function stok_barang(int $id_barang): int
    {
        $row = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.barang')
                ->select('stok')
                ->where('id_barang', $id_barang)
                ->get(),
        )->getRowArray();
        if (!is_array($row)) {
            throw new \RuntimeException("Barang ID {$id_barang} tidak ditemukan.");
        }
        return (int) $row['stok'];
    }

    // Keterangan transaksi mengikuti pola yang ada: nomor dokumen, ruangan,
    // pemohon, petugas gudang.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function keterangan(int $id, int $petugas_gudang): string
    {
        $row = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.pengembalian_barang pg')
                ->join('ruangan.ruangan r', 'pg.master_ruangan = r.id_ruangan', 'left')
                ->join('role.petugas p_pemohon', 'pg.petugas = p_pemohon.id_petugas', 'left')
                ->join('person.orang o_pemohon', 'p_pemohon.id_orang = o_pemohon.id_orang', 'left')
                ->select('pg.no_pengembalian, r.nama_ruangan, o_pemohon.nama AS nama_pemohon')
                ->where('pg.id_pengembalian', $id)
                ->get(),
        )->getRowArray();

        // petugas_gudang belum tersimpan di header saat ini, jadi dibaca terpisah
        $gudang = $this->guarded(
            $this
                ->get_db()
                ->table('role.petugas pt')
                ->join('person.orang o', 'pt.id_orang = o.id_orang', 'left')
                ->select('o.nama')
                ->where('pt.id_petugas', $petugas_gudang)
                ->get(),
        )->getRowArray();

        return trim(implode(', ', array_filter([
            (string) ($row['no_pengembalian'] ?? ''),
            (string) ($row['nama_ruangan'] ?? '') !== '' ? 'Ruangan ' . (string) $row['nama_ruangan'] : '',
            (string) ($row['nama_pemohon'] ?? '') !== '' ? 'Pemohon: ' . (string) $row['nama_pemohon'] : '',
            (string) ($gudang['nama'] ?? '') !== '' ? 'Petugas Gudang: ' . (string) $gudang['nama'] : '',
        ])));
    }
}

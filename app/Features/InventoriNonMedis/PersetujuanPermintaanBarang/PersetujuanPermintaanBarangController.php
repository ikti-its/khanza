<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PersetujuanPermintaanBarang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use CodeIgniter\HTTP\RedirectResponse;

final class PersetujuanPermintaanBarangController extends ControllerTemplate
{
    private bool $pending_keluar = false;

    public function __construct()
    {
        parent::__construct(
            new PersetujuanPermintaanBarangModel(),
            [
                ['Inventori Non Medis',           'inventori_non_medis'],
                ['Persetujuan Permintaan Barang', 'persetujuan_permintaan_barang'],
            ],
            'Persetujuan Permintaan Barang',
            [
                A::READ,
                A::UPDATE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID'],
                [SHOW, OPTIONAL, I::READONLY, 'no_permintaan', 'No. Permintaan'],
                [TABLE_ONLY, OPTIONAL, I::DTIME, 'tanggal', 'Tanggal Permintaan'],
                // HIDE (bukan SHOW): aksi.php TIDAK bergantung pada field ini — ia
                // memindai $baris mentah langsung (kolom 'nama_status_*' selalu ada
                // lewat join model, independen dari visibilitas field controller).
                // HIDE di sini punya tujuan lain: build_modular_columns() mewariskan
                // visibilitas field ke kolom alias join-nya (nama_status_permintaan_barang)
                // lewat make_join_column_config() — jadi HIDE mengeluarkannya dari tabel
                // (kolom 'progress' di bawah, berlabel "Status", sudah menggantikan
                // tampilannya dengan teks presisi) TAPI tetap membuatnya muncul di popup
                // detail baris. Tanpa field ini, kolom itu hilang total dari popup.
                // Label "Status Dokumen" (bukan "Status") supaya di popup tidak bentrok
                // dengan field 'progress' yang juga berlabel "Status".
                [HIDE, REQUIRED, I::SELECT, 'id_status_permintaan_barang', 'Status Dokumen'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'tanggal_diproses', 'Tanggal Diproses'],
                [TABLE_ONLY, OPTIONAL, I::READONLY, 'petugas', 'Pemohon'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'nama_ruangan', 'Ruangan'],
                [
                    FORM_ONLY,
                    OPTIONAL,
                    I::MODAL,
                    'petugas_gudang',
                    'Petugas Gudang',
                    [
                        'modal'          => 'modalPemohon',
                        'display_column' => 'nama',
                        'placeholder'    => 'Klik cari petugas gudang...',
                    ],
                ],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'no_keluar', 'No. Keluar'],
            ],
            // child_path: '/inventori-non-medis/persetujuan-permintaan-barang-detail',
            // child_fk: 'id_permintaan',
        );
    }

    // hanya tampilkan Proses Permintaan (4), Disetujui (2), Ditolak (3) — bukan Draf
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_filter('id_status_permintaan_barang', [2, 3, 4, 5, 6, 7, 8]);
        $this->model->set_order('id_permintaan', 'DESC');
    }

    // narrows the query-result union (bool|Query|BaseResult) that mago infers
    // for ->get()/->query(), matching ModelTemplate::guarded_get() convention.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // Normalisasi nilai kolom boolean permintaan_barang.boleh_pengiriman_sebagian
    // (bisa '1'/'t'/'true'/null tergantung driver) menjadi bool. null → false.
    private function allow_partial_shipment(mixed $value): bool
    {
        return in_array(strtolower((string) ($value ?? 'f')), ['1', 't', 'true', 'y', 'yes'], true);
    }

    // Kolom turunan 'Progress' (lihat get_fields_with_options()) diisi di sini dari
    // get_permintaan_tracking()->progress_label — SUMBER YANG SAMA dipakai
    // PermintaanBarangController::after_read(), pola identik: kolom BARU, TIDAK
    // menimpa 'nama_status_permintaan_barang' (kolom mentah hasil join).
    //
    // Sempat ditimpa langsung di kolom mentah pada perbaikan sebelumnya — ternyata
    // components/aksi/aksi.php (shared, tak boleh disentuh) memindai SEMUA kolom
    // yang mengandung substring 'nama_status' di $baris untuk menentukan tombol
    // Ubah/Hapus vs "Lihat Detail" (mencocokkan teks mentah terhadap whitelist
    // seperti 'proses permintaan'). Menimpa kolom itu dengan progress_label
    // ("Menunggu Persetujuan" dst, tidak ada di whitelist manapun) membuat tombol
    // Ubah hilang untuk baris yang seharusnya masih bisa diproses. Kolom asli
    // sekarang dibiarkan apa adanya seperti sebelum perbaikan itu.
    /** @throws \CodeIgniter\Files\Exceptions\FileNotFoundException */
    #[\Override]
    protected function after_read(array &$data_tabel): void
    {
        if (count($data_tabel) === 0)
            return;

        helper('tracking');
        foreach ($data_tabel as &$row) {
            /** @var array<string, mixed> $row */
            $id = (int) ($row['id_permintaan'] ?? 0);
            if ($id === 0) {
                $row['progress'] = '-';
                continue;
            }

            $tracking        = get_permintaan_tracking($id);
            $row['progress'] = $tracking['progress_label'];
        }
    }

    // Kolom turunan hanya untuk daftar & popup (progress dihitung di after_read()),
    // BUKAN untuk form maupun Audit. Berlabel "Status" (bukan "Progress") — inilah
    // SATU-SATUNYA kolom status yang terlihat pengguna di tabel; kolom mentah
    // 'id_status_permintaan_barang' di atas sengaja HIDE agar tidak dobel di tabel,
    // tapi tetap muncul di popup (lihat komentar pada deklarasi field-nya).
    #[\Override]
    protected function get_fields_with_options(bool $include_pk = false, bool $is_form = false): array
    {
        $fields = parent::get_fields_with_options($include_pk, $is_form);
        if ($is_form)
            return $fields;

        $fields[] = [TABLE_ONLY, 'Status', 'progress', 'status', 0];
        return $fields;
    }

    // halaman detail (readonly)
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    public function detail(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $baris = $this->model->find_one($id);

        $detail_items = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.permintaan_barang_detail d')
                ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
                ->join('inventori_non_medis.satuan s2', 'd.id_satuan_baru = s2.id_satuan', 'left')
                ->select(
                    'd.id_detail, d.id_barang, d.qty, d.qty_disetujui, d.nama_barang_baru, d.id_satuan_baru, d.id_jenis_barang_baru, b.kode_barang, b.nama_barang, b.stok, COALESCE(s.nama_satuan, s2.nama_satuan) AS nama_satuan',
                )
                ->where('d.id_permintaan', (int) $id)
                ->groupStart()
                ->where('d.id_barang >', 0)
                ->orWhere('d.nama_barang_baru IS NOT NULL')
                ->groupEnd()
                ->get(),
        )->getResultArray();

        $boleh_sebagian = is_array($baris) ? $baris['boleh_pengiriman_sebagian'] ?? null : null;

        return view('admin/inventorinonmedis/detail_persetujuan_permintaan_barang', [
            'judul'            => 'Detail ' . $this->title,
            'breadcrumbs'      => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'       => $this->get_uri_path(),
            'baris'            => $baris,
            'detail_items'     => $detail_items,
            'metode_pemenuhan' => $this->allow_partial_shipment($boleh_sebagian) ? 'Boleh Sebagian' : 'Tunggu Lengkap',
        ]);
    }

    // form ubah: 1-page — redirect jika sudah diproses
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function update_page(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $baris = $this->model->find_one($id);

        // redirect ke detail jika sudah final / read-only (Disetujui, Ditolak,
        // Selesai, Dibatalkan, atau Proses Pengiriman)
        $status = is_array($baris) ? (int) ($baris['id_status_permintaan_barang'] ?? 0) : 0;
        if (in_array($status, [2, 3, 6, 7, 8], true)) {
            return $this->detail($id);
        }

        $detail_items = $this->guarded(
            $this
                ->get_db()
                ->table('inventori_non_medis.permintaan_barang_detail d')
                ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
                ->join('inventori_non_medis.satuan s2', 'd.id_satuan_baru = s2.id_satuan', 'left')
                ->select(
                    'd.id_detail, d.id_barang, d.qty, d.qty_disetujui, d.nama_barang_baru, d.id_satuan_baru, d.id_jenis_barang_baru, b.kode_barang, b.nama_barang, b.stok, COALESCE(s.nama_satuan, s2.nama_satuan) AS nama_satuan',
                )
                ->where('d.id_permintaan', (int) $id)
                ->groupStart()
                ->where('d.id_barang >', 0)
                ->orWhere('d.nama_barang_baru IS NOT NULL')
                ->groupEnd()
                ->get(),
        )->getResultArray();

        $boleh_sebagian = is_array($baris) ? $baris['boleh_pengiriman_sebagian'] ?? null : null;

        return view('admin/inventorinonmedis/ubah_persetujuan_permintaan_barang', [
            'judul'            => 'Ubah ' . $this->title,
            'breadcrumbs'      => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'       => $this->get_uri_path(),
            'form_action'      => '/submitedit/' . $id,
            'baris'            => $baris,
            'detail_items'     => $detail_items,
            'metode_pemenuhan' => $this->allow_partial_shipment($boleh_sebagian) ? 'Boleh Sebagian' : 'Tunggu Lengkap',
        ]);
    }

    // validasi petugas, qty & stok sebelum approve, sync qty_disetujui, buat transaksi keluar setelah
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        $new_status     = (int) ($this->request->getPost('id_status_permintaan_barang') ?? 0);
        $current        = $this->model->find((int) $id);
        $current_status = is_array($current) ? (int) ($current['id_status_permintaan_barang'] ?? 0) : 0;

        // Proses Pengiriman (8): stok sudah keluar saat status jadi 8. Satu-satunya
        // transisi sah adalah Konfirmasi Terima → Selesai (6): murni administratif,
        // tanpa klasifikasi item / transaksi stok apa pun.
        if ($current_status === 8) {
            return $this->confirm_terima($id, $new_status);
        }

        // blokir jika sudah final (Disetujui/Ditolak/Menunggu Pengadaan/Selesai)
        if (in_array($current_status, [2, 3, 6, 7], true)) {
            session()->setFlashdata('error', 'Permintaan yang sudah diproses tidak dapat diubah kembali.');
            return $this->home();
        }

        $is_new_approval = $new_status === 2 && $current_status !== 2;

        if ($is_new_approval) {
            if (!$this->request->getPost('petugas_gudang')) {
                session()->setFlashdata('error', 'Petugas gudang wajib diisi sebelum menyetujui permintaan.');
                return redirect()->back();
            }
        }

        // sync qty_disetujui from form (by id_detail for both existing and baru items)
        $detail_id_detail     = (array) ($this->request->getPost('detail_id_detail') ?? []);
        $detail_qty_disetujui = (array) ($this->request->getPost('detail_qty_disetujui') ?? []);

        $db = $this->get_db();
        for ($i = 0; $i < count($detail_qty_disetujui); $i++) {
            $id_detail = (int) ($detail_id_detail[$i] ?? 0);
            $qty_d     = (int) ($detail_qty_disetujui[$i] ?? 0);
            if ($id_detail > 0) {
                $db
                    ->table('inventori_non_medis.permintaan_barang_detail')
                    ->where('id_detail', $id_detail)
                    ->update(['qty_disetujui' => $qty_d]);
            }
        }

        // default: dipakai lagi di luar blok $is_new_approval di bawah tanpa
        // mengubah alur — mago tidak bisa membuktikan kedua blok if ($is_new_approval)
        // selalu berjalan bersamaan, jadi perlu nilai awal yang eksplisit.
        $has_existing      = false;
        $needs_procurement = false;
        $procurement_items = [];
        $existing_items    = [];

        if ($is_new_approval) {
            $has_approved_items = $db
                ->table('inventori_non_medis.permintaan_barang_detail')
                ->where('id_permintaan', (int) $id)
                ->where('qty_disetujui >', 0)
                ->countAllResults() > 0;
            if (!$has_approved_items) {
                session()->setFlashdata(
                    'error',
                    'Isi qty disetujui pada detail permintaan terlebih dahulu sebelum menyetujui.',
                );
                return redirect()->back();
            }

            // Simpan detail yang memang berasal dari input barang baru sebelum diregistrasikan.
            $new_detail_rows = $this->guarded(
                $db
                    ->table('inventori_non_medis.permintaan_barang_detail')
                    ->select('id_detail')
                    ->where('id_permintaan', (int) $id)
                    ->where('id_barang IS NULL')
                    ->where('nama_barang_baru IS NOT NULL')
                    ->where('qty_disetujui >', 0)
                    ->get(),
            )->getResultArray();
            /** @var list<array<string, mixed>> $new_detail_rows */
            $new_detail_ids = array_map(static fn(array $row): int => (int) $row['id_detail'], $new_detail_rows);

            // Register barang baru ke master. Bila gagal, hentikan persetujuan dan
            // JANGAN ubah status permintaan — status header belum disentuh di sini.
            try {
                $this->register_barang_baru((int) $id);
            } catch (\Throwable $e) {
                log_message('error', '[Approval] register_barang_baru: ' . $e->getMessage());
                session()->setFlashdata(
                    'error',
                    'Gagal menyetujui permintaan: ' . $e->getMessage() . ' Status permintaan tidak diubah.',
                );
                return redirect()->back();
            }

            // Determine: ada barang baru dan/atau existing?
            $all_details = $this->guarded(
                $db
                    ->table('inventori_non_medis.permintaan_barang_detail d')
                    ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                    ->select('d.id_detail, d.id_barang, d.qty_disetujui, b.stok, b.nama_barang')
                    ->where('d.id_permintaan', (int) $id)
                    ->where('d.id_barang >', 0)
                    ->where('d.qty_disetujui >', 0)
                    ->get(),
            )->getResultArray();
            /** @var list<array<string, mixed>> $all_details */

            $allow_partial     = $this->allow_partial_shipment($current['boleh_pengiriman_sebagian'] ?? null);
            $available_items   = [];
            $procurement_items = [];
            foreach ($all_details as $d) {
                if (in_array((int) $d['id_detail'], $new_detail_ids, true)) {
                    $d['qty_pengadaan']  = (int) $d['qty_disetujui'];
                    $procurement_items[] = $d;
                } else {
                    $stok          = (int) ($d['stok'] ?? 0);
                    $qty_disetujui = (int) $d['qty_disetujui'];
                    if ($stok >= $qty_disetujui) {
                        $d['qty_dikeluarkan'] = $qty_disetujui;
                        $available_items[]    = $d;
                        continue;
                    }

                    $d['qty_pengadaan']  = $qty_disetujui - $stok;
                    $procurement_items[] = $d;
                    if ($allow_partial && $stok > 0) {
                        $d['qty_dikeluarkan'] = $stok;
                        $available_items[]    = $d;
                    }
                }
            }

            $needs_procurement = count($procurement_items) > 0;
            // Tunggu lengkap menahan seluruh permintaan jika ada item yang kurang.
            $existing_items = !$allow_partial && $needs_procurement ? [] : $available_items;
            $has_existing   = count($existing_items) > 0;
        }

        // Determine final status
        $postData = [
            'petugas_gudang' => $this->request->getPost('petugas_gudang') ?: null,
        ];
        $no_keluar_baru = null;

        if ($is_new_approval) {
            $postData['tanggal_diproses'] = date('Y-m-d H:i:s');

            if ($needs_procurement && !$has_existing) {
                // Semua item membutuhkan pengadaan.
                $postData['id_status_permintaan_barang'] = 5;
            } elseif ($needs_procurement && $has_existing) {
                // Sebagian tersedia dan sebagian membutuhkan pengadaan.
                $postData['id_status_permintaan_barang'] = 5;
            } else {
                // Semua item tersedia dari stok, tidak perlu pengadaan. Stok keluar
                // dibuat di bawah, lalu permintaan menunggu konfirmasi terima dari
                // pihak peminta → Proses Pengiriman (8), bukan langsung Selesai (6).
                $postData['id_status_permintaan_barang'] = 8;
            }

            // Generate no_keluar hanya jika ada item yang langsung dikirim.
            if ($has_existing) {
                helper('autonomor');
                /** @var string|null $lastNo */
                $lastNo = $this->get_last('inventori_non_medis.permintaan_barang', 'no_keluar', 'id_permintaan');

                $no_keluar_baru        = generateNextNoKeluarBarang($lastNo);
                $postData['no_keluar'] = $no_keluar_baru;
                $this->pending_keluar  = true;
            }
        } elseif (in_array($new_status, [3, 7], true)) {
            // Ditolak atau dibatalkan tanpa membuat transaksi stok baru.
            $postData['id_status_permintaan_barang'] = $new_status;
            $postData['tanggal_diproses']            = date('Y-m-d H:i:s');
        } else {
            $postData['id_status_permintaan_barang'] = $new_status;
        }

        // Buat transaksi stok keluar untuk item existing TERLEBIH DAHULU.
        // Kalau langkah ini gagal, status header tidak boleh terlanjur berubah.
        if ($this->pending_keluar && $no_keluar_baru !== null) {
            $this->pending_keluar = false;
            try {
                $this->create_transaksi_stok_keluar_existing((int) $id, $no_keluar_baru, $existing_items);
            } catch (\Throwable $e) {
                log_message('error', '[Approval] create_transaksi_stok_keluar: ' . $e->getMessage());
                session()->setFlashdata(
                    'error',
                    'Gagal membuat transaksi stok keluar, permintaan tidak diubah: ' . $e->getMessage(),
                );
                return redirect()->back();
            }
        }

        try {
            $this->model->update($id, $postData);
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $e) {
            session()->setFlashdata('error', 'Gagal memperbarui: ' . $e->getMessage());
            return redirect()->back();
        }

        // Auto-create Pengajuan untuk barang baru
        if ($is_new_approval && $needs_procurement) {
            try {
                $no_pengajuan = $this->auto_create_pengajuan((int) $id, $procurement_items);
                session()->setFlashdata(
                    'success',
                    "Permintaan disetujui. Pengajuan {$no_pengajuan} otomatis dibuat karena stok belum tersedia, menunggu persetujuan atasan logistik.",
                );
            } catch (\Throwable $e) {
                log_message('error', '[AutoPengajuan] ' . $e->getMessage());
                session()->setFlashdata(
                    'error',
                    'Disetujui, namun gagal membuat pengajuan otomatis: ' . $e->getMessage(),
                );
            }
        }

        return $this->home();
    }

    /**
     * Konfirmasi Terima: transisi Proses Pengiriman (8) → Selesai (6).
     * Hanya mencatat penerima + waktu terima; stok sudah keluar saat status jadi 8.
     */
    private function confirm_terima(int|string $id, int $new_status): RedirectResponse
    {
        if ($new_status !== 6) {
            session()->setFlashdata('error', 'Permintaan yang sudah diproses tidak dapat diubah kembali.');
            return $this->home();
        }

        $petugas_penerima = $this->request->getPost('petugas_penerima') ?: null;
        if (!$petugas_penerima) {
            session()->setFlashdata('error', 'Petugas penerima wajib diisi untuk mengonfirmasi penerimaan barang.');
            return redirect()->back();
        }

        try {
            $this->model->update($id, [
                'id_status_permintaan_barang' => 6,
                'petugas_penerima'            => $petugas_penerima,
                'tanggal_diterima'            => date('Y-m-d H:i:s'),
            ]);
            session()->setFlashdata('success', 'Penerimaan barang dikonfirmasi. Permintaan selesai.');
        } catch (\Throwable $e) {
            session()->setFlashdata('error', 'Gagal mengonfirmasi penerimaan: ' . $e->getMessage());
            return redirect()->back();
        }

        return $this->home();
    }

    /**
     * Auto-insert barang baru ke master saat disetujui.
     * Update detail row: set id_barang = id baru, clear nama_barang_baru.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     * @throws \RuntimeException
     */
    private function register_barang_baru(int $id_permintaan): void
    {
        $db = $this->get_db();

        $baru_items = $this->guarded(
            $db
                ->table('inventori_non_medis.permintaan_barang_detail')
                ->select('id_detail, nama_barang_baru, id_satuan_baru, id_jenis_barang_baru, qty_disetujui')
                ->where('id_permintaan', $id_permintaan)
                ->where('id_barang IS NULL')
                ->where('nama_barang_baru IS NOT NULL')
                ->where('qty_disetujui >', 0)
                ->get(),
        )->getResultArray();
        /** @var list<array<string, mixed>> $baru_items */

        if (count($baru_items) === 0)
            return;

        helper('autonomor');

        // Seluruh loop dibungkus satu transaksi: kegagalan pada item mana pun
        // tidak boleh meninggalkan barang master yatim (tersimpan tanpa detail
        // permintaan yang ter-link).
        $db->transBegin();

        try {
            foreach ($baru_items as $item) {
                // barang.id_satuan & barang.id_jenis_barang NOT NULL — tolak baris
                // barang baru yang tak lengkap alih-alih mengirim null ke DB.
                $id_satuan_baru = (int) ($item['id_satuan_baru'] ?? 0);
                $id_jenis_baru  = (int) ($item['id_jenis_barang_baru'] ?? 0);
                $nama_baru      = trim((string) ($item['nama_barang_baru'] ?? ''));
                if ($nama_baru === '' || $id_satuan_baru <= 0 || $id_jenis_baru <= 0) {
                    throw new \RuntimeException(
                        'Barang baru "'
                        . ($nama_baru !== '' ? $nama_baru : '(tanpa nama)')
                        . '" tidak memiliki satuan atau jenis barang yang lengkap.',
                    );
                }

                // Generate kode barang otomatis
                $lastKode = $this->guarded(
                    $db
                        ->table('inventori_non_medis.barang')
                        ->select('kode_barang')
                        ->orderBy('id_barang', 'DESC')
                        ->limit(1)
                        ->get(),
                )->getRowArray();
                /** @var array<string, mixed>|null $lastKode */
                $kodeLama = $lastKode['kode_barang'] ?? null;
                /** @var string|null $kodeLama */
                $kode = generateNextKodeBarang($kodeLama);

                // Insert ke master barang
                $db->table('inventori_non_medis.barang')->insert([
                    'kode_barang'     => $kode,
                    'nama_barang'     => $nama_baru,
                    'id_satuan'       => $id_satuan_baru,
                    'id_jenis_barang' => $id_jenis_baru,
                    'stok'            => 0,
                    'stok_minimum'    => 0,
                ]);
                $new_id_barang = (int) $db->insertID();

                // Update detail row — link ke master baru
                $db
                    ->table('inventori_non_medis.permintaan_barang_detail')
                    ->where('id_detail', (int) $item['id_detail'])
                    ->update([
                        'id_barang'        => $new_id_barang,
                        'nama_barang_baru' => null,
                    ]);
            }
        } catch (\RuntimeException $e) {
            $db->transRollback();
            throw $e;
        } catch (\Throwable $e) {
            $db->transRollback();
            throw new \RuntimeException('Registrasi barang baru gagal: ' . $e->getMessage(), 0, $e);
        }

        if ($db->transStatus() === false) {
            $db->transRollback();
            throw new \RuntimeException('Registrasi barang baru gagal, semua perubahan dibatalkan.');
        }

        $db->transCommit();
    }

    /**
     * Transaksi stok keluar HANYA untuk item existing (stok > 0).
     *
     * @param list<array<string, mixed>> $existing_items
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function create_transaksi_stok_keluar_existing(int $id, string $no_keluar, array $existing_items): void
    {
        if (count($existing_items) === 0)
            return;

        $db = $this->get_db();

        $row = $this->guarded(
            $db
                ->table('inventori_non_medis.permintaan_barang pb')
                ->join('ruangan.ruangan r', 'pb.master_ruangan = r.id_ruangan', 'left')
                ->join('role.petugas p_pemohon', 'pb.petugas = p_pemohon.id_petugas', 'left')
                ->join('person.orang o_pemohon', 'p_pemohon.id_orang = o_pemohon.id_orang', 'left')
                ->join('role.petugas p_petugas_gudang', 'pb.petugas_gudang = p_petugas_gudang.id_petugas', 'left')
                ->join('person.orang o_petugas_gudang', 'p_petugas_gudang.id_orang = o_petugas_gudang.id_orang', 'left')
                ->select(
                    'pb.no_permintaan, r.nama_ruangan, o_pemohon.nama AS nama_pemohon, o_petugas_gudang.nama AS nama_petugas_gudang',
                )
                ->where('pb.id_permintaan', $id)
                ->get(),
        )->getRowArray();
        /** @var array<string, mixed>|null $row */

        $keterangan = trim(implode(', ', array_filter([
            (string) ($row['no_permintaan'] ?? ''),
            (string) ($row['nama_ruangan'] ?? '') !== '' ? 'Ruangan ' . (string) $row['nama_ruangan'] : '',
            (string) ($row['nama_pemohon'] ?? '') !== '' ? 'Pemohon: ' . (string) $row['nama_pemohon'] : '',
            (string) ($row['nama_petugas_gudang'] ?? '') !== ''
                ? 'Petugas Gudang: ' . (string) $row['nama_petugas_gudang']
                : '',
        ])));

        $now = date('Y-m-d H:i:s');
        $db->transBegin();

        $db->table('inventori_non_medis.transaksi_stok')->insert([
            'id_tipe_transaksi_stok' => 2,
            'tanggal'                => $now,
            'id_permintaan'          => $id,
            'keterangan'             => $keterangan,
        ]);
        $id_transaksi = (int) $db->insertID();

        foreach ($existing_items as $d) {
            $qty          = (int) ($d['qty_dikeluarkan'] ?? 0);
            $stok_sebelum = (int) ($d['stok'] ?? 0);

            $harga = $this->guarded(
                $db
                    ->table('inventori_non_medis.barang')
                    ->select('harga_satuan')
                    ->where('id_barang', (int) $d['id_barang'])
                    ->get(),
            )->getRowArray();
            /** @var array<string, mixed>|null $harga */

            $db->table('inventori_non_medis.transaksi_stok_detail')->insert([
                'id_transaksi' => $id_transaksi,
                'id_barang'    => (int) $d['id_barang'],
                'qty'          => $qty,
                'harga_satuan' => isset($harga['harga_satuan']) && (float) $harga['harga_satuan'] > 0
                    ? $harga['harga_satuan']
                    : null,
                'stok_sebelum' => $stok_sebelum,
                'stok_sesudah' => $stok_sebelum - $qty,
            ]);
            $db
                ->table('inventori_non_medis.barang')
                ->where('id_barang', (int) $d['id_barang'])
                ->set('stok', 'stok - ' . $qty, false)
                ->update();
        }

        $db->transCommit();
    }

    /**
     * Auto-create Pengajuan Barang dari item yang membutuhkan kekurangan stok.
     *
     * @param list<array<string, mixed>> $baru_items
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    private function auto_create_pengajuan(int $id_permintaan, array $baru_items): string
    {
        if (count($baru_items) === 0)
            return '';

        $db = $this->get_db();
        helper('autonomor');

        $now = date('Y-m-d H:i:s');

        $row = $this->guarded(
            $db
                ->table('inventori_non_medis.pengajuan_barang')
                ->select('no_pengajuan')
                ->orderBy('id_pengajuan', 'DESC')
                ->limit(1)
                ->get(),
        )->getRowArray();
        /** @var array<string, mixed>|null $row */
        $lastNo = $row['no_pengajuan'] ?? null;
        /** @var string|null $lastNo */

        $no_pengajuan = generateNextNoPengajuanBarang($lastNo, $now);

        // Get petugas_gudang dari permintaan (yang approve)
        $permintaan = $this->guarded(
            $db
                ->table('inventori_non_medis.permintaan_barang')
                ->select('petugas_gudang')
                ->where('id_permintaan', $id_permintaan)
                ->get(),
        )->getRowArray();
        /** @var array<string, mixed>|null $permintaan */

        $db->transBegin();

        $db->table('inventori_non_medis.pengajuan_barang')->insert([
            'no_pengajuan'               => $no_pengajuan,
            'tanggal'                    => $now,
            'petugas_gudang'             => $permintaan['petugas_gudang'] ?? null,
            'id_status_pengajuan_barang' => 4, // Proses Pengajuan
            'id_permintaan' => $id_permintaan,
        ]);
        $id_pengajuan = (int) $db->insertID();

        foreach ($baru_items as $item) {
            $db->table('inventori_non_medis.pengajuan_barang_detail')->insert([
                'id_pengajuan' => $id_pengajuan,
                'id_barang'    => (int) $item['id_barang'],
                'qty'          => (int) ($item['qty_pengadaan'] ?? $item['qty_disetujui']),
                'harga'        => null,
            ]);
        }

        $db->transCommit();

        return $no_pengajuan;
    }
}

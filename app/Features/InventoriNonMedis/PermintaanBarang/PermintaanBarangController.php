<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use CodeIgniter\HTTP\RedirectResponse;

final class PermintaanBarangController extends ControllerTemplate
{
    protected array $search_columns = ['no_permintaan', 'nama', 'nama_ruangan'];

    public function __construct()
    {
        parent::__construct(
            new PermintaanBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Permintaan Barang',   'permintaan_barang'],
            ],
            'Permintaan Barang',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE,      OPTIONAL, I::INDEX,    'id_permintaan',             'ID'],
                [SHOW,      OPTIONAL, I::READONLY, 'no_permintaan',             'No. Permintaan'],
                [SHOW,      REQUIRED, I::DTIME,    'tanggal',                   'Tanggal Permintaan'],
                [SHOW,      REQUIRED, I::READONLY, 'petugas',                   'Pemohon'],
                [SHOW,      REQUIRED, I::READONLY, 'master_ruangan',            'Ruangan'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'tanggal_diproses',          'Tanggal Diproses'],
                [FORM_ONLY, OPTIONAL, I::READONLY, 'no_keluar',                 'No. Keluar'],
                [FORM_ONLY, REQUIRED, I::SELECT,   'boleh_pengiriman_sebagian', 'Metode Pemenuhan'],
            ],
        );
    }

    // urut descending
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_order('id_permintaan', 'DESC');
    }

    // tambah kolom progress & petugas gudang
    #[\Override]
    protected function get_fields_with_options(bool $include_pk = false, bool $is_form = false): array
    {
        $fields = parent::get_fields_with_options($include_pk, $is_form);
        if ($is_form)
            return $fields;

        $fields[] = [TABLE_ONLY, 'Progress', 'progress', 'status', 0];
        $fields[] = [FORM_ONLY, 'Petugas Gudang', 'petugas_gudang_nama', 'teks', 0];
        return $fields;
    }

    // pastikan hasil query valid
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // ubah nilai boolean jadi true/false
    private function allow_partial_shipment(mixed $value): bool
    {
        return in_array(strtolower((string) ($value ?? 'f')), ['1', 't', 'true', 'y', 'yes'], true);
    }

    // isi metode pemenuhan & progress di tabel
    /** @throws \CodeIgniter\Files\Exceptions\FileNotFoundException */
    #[\Override]
    protected function after_read(array &$data_tabel): void
    {
        if (count($data_tabel) === 0)
            return;

        helper('tracking');
        foreach ($data_tabel as &$row) {
            /** @var array<string, mixed> $row */
            $row['boleh_pengiriman_sebagian'] = $this->allow_partial_shipment($row['boleh_pengiriman_sebagian'] ?? null)
                ? 'Boleh Sebagian'
                : 'Tunggu Lengkap';

            $id = (int) ($row['id_permintaan'] ?? 0);
            if ($id === 0) {
                $row['progress'] = '-';
                continue;
            }

            $tracking        = get_permintaan_tracking($id);
            $row['progress'] = $tracking['progress_label'];
        }
    }

    // form tambah: 1-page header + detail
    #[\Override]
    public function create_page(): string
    {
        return view('admin/inventorinonmedis/tambah_permintaan_barang', [
            'judul'          => 'Tambah ' . $this->title,
            'breadcrumbs'    => array_merge($this->breadcrumbs, [['title' => 'Tambah', 'icon' => 'tambah']]),
            'modul_path'     => $this->get_uri_path(),
            'form_action'    => '/submittambah/',
            'options_satuan' => $this->get_options_satuan(),
            'options_jenis'  => $this->get_options_jenis(),
        ]);
    }

    // halaman detail permintaan + timeline
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
                    'd.id_detail, d.id_barang, d.qty, d.qty_disetujui, d.nama_barang_baru, d.id_satuan_baru, d.id_jenis_barang_baru, b.kode_barang, b.nama_barang, COALESCE(s.nama_satuan, s2.nama_satuan) AS nama_satuan',
                )
                ->where('d.id_permintaan', (int) $id)
                ->groupStart()
                ->where('d.id_barang >', 0)
                ->orWhere('d.nama_barang_baru IS NOT NULL')
                ->groupEnd()
                ->get(),
        )->getResultArray();

        $boleh_sebagian = is_array($baris) ? $baris['boleh_pengiriman_sebagian'] ?? null : null;

        $pengembalian = new \App\Features\InventoriNonMedis\PengembalianBarang\PengembalianBarangService(
            $this->get_db(),
        );
        $bisa_ajukan_pengembalian = $pengembalian->permintaan_dapat_dikembalikan((int) $id) !== [];

        return view('admin/inventorinonmedis/detail_permintaan_barang', [
            'judul'                    => 'Detail ' . $this->title,
            'breadcrumbs'              => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'               => $this->get_uri_path(),
            'baris'                    => $baris,
            'detail_items'             => $detail_items,
            'metode_pemenuhan'         => $this->allow_partial_shipment($boleh_sebagian)
                ? 'Boleh Sebagian'
                : 'Tunggu Lengkap',
            'pengembalian_terkait'     => $pengembalian->pengembalian_by_permintaan((int) $id),
            'bisa_ajukan_pengembalian' => $bisa_ajukan_pengembalian,
        ]);
    }

    // form ubah header + detail
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function update_page(int|string $id): string|RedirectResponse
    {
        $baris = $this->model->find_one($id);

        // redirect ke detail jika bukan Draf
        if (is_array($baris) && (int) ($baris['id_status_permintaan_barang'] ?? 0) !== 1) {
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
                    'd.id_detail, d.id_barang, d.qty, d.nama_barang_baru, d.id_satuan_baru, d.id_jenis_barang_baru, b.kode_barang, b.nama_barang, COALESCE(s.nama_satuan, s2.nama_satuan) AS nama_satuan',
                )
                ->where('d.id_permintaan', (int) $id)
                ->groupStart()
                ->where('d.id_barang >', 0)
                ->orWhere('d.nama_barang_baru IS NOT NULL')
                ->groupEnd()
                ->get(),
        )->getResultArray();

        return view('admin/inventorinonmedis/tambah_permintaan_barang', [
            'judul'          => 'Ubah ' . $this->title,
            'breadcrumbs'    => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'     => $this->get_uri_path(),
            'form_action'    => '/submitedit/' . $id,
            'baris'          => $baris,
            'detail_items'   => $detail_items,
            'readonly'       => false,
            'options_satuan' => $this->get_options_satuan(),
            'options_jenis'  => $this->get_options_jenis(),
        ]);
    }

    // simpan header + detail sekaligus
    /** @throws \CodeIgniter\Files\Exceptions\FileNotFoundException */
    #[\Override]
    public function create(): string|RedirectResponse
    {
        $postData = [
            'tanggal'                   => $this->request->getPost('tanggal'),
            'petugas'                   => $this->request->getPost('petugas') ?: null,
            'master_ruangan'            => $this->request->getPost('master_ruangan') ?: null,
            'boleh_pengiriman_sebagian' => $this->request->getPost('boleh_pengiriman_sebagian') === '1',
        ];

        helper('autonomor');
        /** @var string|null $lastNo */
        $lastNo            = $this->get_last('inventori_non_medis.permintaan_barang', 'no_permintaan', 'id_permintaan');
        $tanggalPermintaan = $postData['tanggal'] ?? null;
        /** @var string|null $tanggalPermintaan */
        $postData['no_permintaan']               = generateNextNoPermintaanBarang($lastNo, $tanggalPermintaan);
        $postData['id_status_permintaan_barang'] = (int) ($this->request->getPost('id_status_permintaan_barang') ?? 1);

        $detail_ids = $this->request->getPost('detail_id_barang') ?? [];
        /** @var array<array-key, mixed> $detail_ids */
        $detail_baru = $this->request->getPost('detail_is_baru') ?? [];
        /** @var array<array-key, mixed> $detail_baru */
        $has_items = false;
        for ($i = 0; $i < count($detail_ids); $i++) {
            if (($detail_baru[$i] ?? '0') === '1' || (int) ($detail_ids[$i] ?? 0) > 0) {
                $has_items = true;
                break;
            }
        }
        if ($postData['id_status_permintaan_barang'] === 4 && !$has_items) {
            session()->setFlashdata('error', 'Tambahkan detail barang terlebih dahulu sebelum mengajukan permintaan.');
            return $this->home();
        }

        $db = $this->get_db();

        try {
            $db->transBegin();

            $this->model->insert($postData);
            $id_permintaan = (int) $db->insertID();

            $this->save_detail_items($db, $id_permintaan);

            $db->transCommit();
            session()->setFlashdata('success', 'Data Permintaan Barang berhasil disimpan.');
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menyimpan: ' . $e->getMessage());
        }

        return $this->home();
    }

    // hapus header + detail sekaligus
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (is_array($current) && (int) ($current['id_status_permintaan_barang'] ?? 0) !== 1) {
            session()->setFlashdata('error', 'Permintaan yang sudah diproses tidak dapat dihapus.');
            return $this->home();
        }

        $db = $this->get_db();
        try {
            $db->transBegin();
            $db
                ->table('inventori_non_medis.permintaan_barang_detail')
                ->where('id_permintaan', (int) $id)
                ->delete();
            $this->model->delete($id);
            $db->transCommit();
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menghapus: ' . $e->getMessage());
        }

        return $this->home();
    }

    // update header + sync detail items
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        $current = $this->model->find((int) $id);
        if (is_array($current) && (int) ($current['id_status_permintaan_barang'] ?? 0) !== 1) {
            session()->setFlashdata('error', 'Permintaan yang sudah diproses tidak dapat diubah.');
            return $this->home();
        }

        $postData = [
            'tanggal'                     => $this->request->getPost('tanggal'),
            'petugas'                     => $this->request->getPost('petugas') ?: null,
            'master_ruangan'              => $this->request->getPost('master_ruangan') ?: null,
            'id_status_permintaan_barang' => $this->request->getPost('id_status_permintaan_barang') ?? 1,
            'boleh_pengiriman_sebagian'   => $this->request->getPost('boleh_pengiriman_sebagian') === '1',
        ];

        // validasi status
        $new_status = (int) ($postData['id_status_permintaan_barang'] ?? 0);
        if (!in_array($new_status, [1, 4], true)) {
            $postData['id_status_permintaan_barang'] = (int) ($current['id_status_permintaan_barang'] ?? 1);
        }

        // cek detail sebelum proses permintaan
        $detail_ids = $this->request->getPost('detail_id_barang') ?? [];
        /** @var array<array-key, mixed> $detail_ids */
        $detail_baru = $this->request->getPost('detail_is_baru') ?? [];
        /** @var array<array-key, mixed> $detail_baru */
        $has_items = false;
        for ($i = 0; $i < count($detail_ids); $i++) {
            if (($detail_baru[$i] ?? '0') === '1' || (int) ($detail_ids[$i] ?? 0) > 0) {
                $has_items = true;
                break;
            }
        }
        if ($new_status === 4 && !$has_items) {
            session()->setFlashdata('error', 'Tambahkan detail barang terlebih dahulu sebelum mengajukan permintaan.');
            return $this->home();
        }

        $db = $this->get_db();

        try {
            $db->transBegin();

            $this->model->update($id, $postData);

            // sync detail: hapus semua lalu insert ulang
            $db
                ->table('inventori_non_medis.permintaan_barang_detail')
                ->where('id_permintaan', (int) $id)
                ->delete();

            $this->save_detail_items($db, (int) $id);

            $db->transCommit();
            session()->setFlashdata('success', 'Data Permintaan Barang berhasil diperbarui.');
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal memperbarui: ' . $e->getMessage());
        }

        return $this->home();
    }

    // ajukan pembatalan permintaan
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \ReflectionException
     */
    public function sampel(int|string $id): RedirectResponse
    {
        $current = $this->model->find((int) $id);
        $status  = is_array($current) ? (int) ($current['id_status_permintaan_barang'] ?? 0) : 0;

        if (!in_array($status, [4, 5], true)) {
            session()->setFlashdata(
                'error',
                'Pembatalan hanya bisa diajukan saat permintaan masih Proses Permintaan atau Menunggu Pengadaan.',
            );
            return $this->home();
        }

        $alasan = trim((string) ($this->request->getPost('alasan_pembatalan') ?? ''));
        if ($alasan === '') {
            session()->setFlashdata('error', 'Alasan pembatalan wajib diisi.');
            return $this->home();
        }

        $this->model->update($id, [
            'pengajuan_pembatalan' => true,
            'alasan_pembatalan'    => $alasan,
            'tanggal_pembatalan'   => date('Y-m-d H:i:s'),
        ]);
        session()->setFlashdata('success', 'Pengajuan pembatalan berhasil dikirim, menunggu keputusan Staf Gudang.');

        return $this->home();
    }

    // simpan baris detail permintaan
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \RuntimeException bila baris barang baru tidak lengkap
     */
    private function save_detail_items(\CodeIgniter\Database\BaseConnection $db, int $id_permintaan): void
    {
        $detail_ids = $this->request->getPost('detail_id_barang') ?? [];
        /** @var array<array-key, mixed> $detail_ids */
        $detail_qty = $this->request->getPost('detail_qty') ?? [];
        /** @var array<array-key, mixed> $detail_qty */
        $detail_is_baru = $this->request->getPost('detail_is_baru') ?? [];
        /** @var array<array-key, mixed> $detail_is_baru */
        $detail_nama_baru = $this->request->getPost('detail_nama_baru') ?? [];
        /** @var array<array-key, mixed> $detail_nama_baru */
        $detail_satuan = $this->request->getPost('detail_satuan_baru') ?? [];
        /** @var array<array-key, mixed> $detail_satuan */
        $detail_jenis = $this->request->getPost('detail_jenis_baru') ?? [];
        /** @var array<array-key, mixed> $detail_jenis */

        for ($i = 0; $i < count($detail_qty); $i++) {
            $qty     = (int) ($detail_qty[$i] ?? 0);
            $is_baru = ($detail_is_baru[$i] ?? '0') === '1';

            if ($is_baru) {
                $nama      = trim((string) ($detail_nama_baru[$i] ?? ''));
                $id_satuan = (int) ($detail_satuan[$i] ?? 0);
                $id_jenis  = (int) ($detail_jenis[$i] ?? 0);

                if ($nama === '' && $id_satuan <= 0 && $id_jenis <= 0 && $qty <= 0) {
                    // baris kosong sepenuhnya, lewati diam-diam
                    continue;
                }

                if ($nama === '' || $id_satuan <= 0 || $id_jenis <= 0 || $qty <= 0) {
                    throw new \RuntimeException(
                        'Barang baru "'
                        . ($nama !== '' ? $nama : '(tanpa nama)')
                        . '" wajib mengisi nama, satuan, jenis barang, dan qty.',
                    );
                }

                $db->table('inventori_non_medis.permintaan_barang_detail')->insert([
                    'id_permintaan'        => $id_permintaan,
                    'id_barang'            => null,
                    'nama_barang_baru'     => $nama,
                    'id_satuan_baru'       => $id_satuan,
                    'id_jenis_barang_baru' => $id_jenis,
                    'qty'                  => $qty,
                ]);
            } else {
                $id_barang = (int) ($detail_ids[$i] ?? 0);
                if ($id_barang > 0 && $qty > 0) {
                    $db->table('inventori_non_medis.permintaan_barang_detail')->insert([
                        'id_permintaan' => $id_permintaan,
                        'id_barang'     => $id_barang,
                        'qty'           => $qty,
                    ]);
                }
            }
        }
    }

    // pilihan satuan untuk barang baru
    private function get_options_satuan(): array
    {
        try {
            return $this->guarded(
                $this
                    ->get_db()
                    ->table('inventori_non_medis.satuan')
                    ->select('id_satuan, nama_satuan')
                    ->orderBy('nama_satuan', 'ASC')
                    ->get(),
            )->getResultArray();
        } catch (\Throwable) {
            return [];
        }
    }

    // pilihan jenis untuk barang baru
    private function get_options_jenis(): array
    {
        try {
            return $this->guarded(
                $this
                    ->get_db()
                    ->table('inventori_non_medis.jenis_barang')
                    ->select('id_jenis_barang, nama_jenis_barang')
                    ->orderBy('nama_jenis_barang', 'ASC')
                    ->get(),
            )->getResultArray();
        } catch (\Throwable) {
            return [];
        }
    }
}

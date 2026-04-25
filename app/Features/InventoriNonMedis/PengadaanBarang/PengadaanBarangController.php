<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengadaanBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengadaanBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengadaan Barang',    'icon' => 'pengadaan_barang'],
            ],
            judul: 'Pengadaan Barang',
            modul_path: '/inventori-non-medis/pengadaan-barang',
            nama_tabel: 'pengadaan_barang',
            kolom_id: 'id_pengadaan',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Pengadaan', 'id_pengadaan', 'indeks',  OPTIONAL],
                [HIDE, 'ID Pengajuan', 'id_pengajuan', 'indeks',  OPTIONAL],
                [SHOW, 'Supplier',     'id_supplier',  'status',  REQUIRED],
                [SHOW, 'Tanggal',      'tanggal',      'tanggal', REQUIRED],
                [SHOW, 'Status',       'status',       'status',  OPTIONAL],
                [SHOW, 'Catatan',      'catatan',      'teks',    OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

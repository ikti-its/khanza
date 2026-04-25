<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Pengadaan', 'id_pengadaan', 'indeks',  0],
                [0, 'ID Pengajuan', 'id_pengajuan', 'indeks',  0],
                [1, 'Supplier',     'id_supplier',  'status',  1],
                [1, 'Tanggal',      'tanggal',      'tanggal', 1],
                [1, 'Status',       'status',       'status',  0],
                [1, 'Catatan',      'catatan',      'teks',    0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

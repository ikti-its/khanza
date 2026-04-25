<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;
use App\Core\Controller\ControllerTemplate;

final class BarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new BarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Barang',              'icon' => 'barang'],
            ],
            judul: 'Barang',
            modul_path: '/inventori-non-medis/barang',
            nama_tabel: 'barang',
            kolom_id: 'id_barang',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Barang',    'id_barang',       'indeks', OPTIONAL],
                [SHOW, 'Kode Barang',  'kode_barang',     'teks',   REQUIRED],
                [SHOW, 'Nama Barang',  'nama_barang',     'nama',   REQUIRED],
                [SHOW, 'Jenis Barang', 'id_jenis_barang', 'status', REQUIRED],
                [SHOW, 'Kategori',     'id_kategori',     'status', REQUIRED],
                [SHOW, 'Supplier',     'id_supplier',     'status', OPTIONAL],
                [SHOW, 'Unit',         'id_unit',         'status', REQUIRED],
                [SHOW, 'Lokasi',       'id_lokasi',       'status', OPTIONAL],
                [SHOW, 'Stok',         'stok',            'jumlah', OPTIONAL],
                [SHOW, 'Stok Minimum', 'stok_minimum',    'jumlah', OPTIONAL],
                [SHOW, 'Harga Satuan', 'harga_satuan',    'uang',   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

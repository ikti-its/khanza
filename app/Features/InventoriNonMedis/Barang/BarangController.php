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
                [0, 'ID Barang',    'id_barang',       'indeks', 0],
                [1, 'Kode Barang',  'kode_barang',     'teks',   1],
                [1, 'Nama Barang',  'nama_barang',     'nama',   1],
                [1, 'Jenis Barang', 'id_jenis_barang', 'status', 1],
                [1, 'Kategori',     'id_kategori',     'status', 1],
                [1, 'Supplier',     'id_supplier',     'status', 0],
                [1, 'Unit',         'id_unit',         'status', 1],
                [1, 'Lokasi',       'id_lokasi',       'status', 0],
                [1, 'Stok',         'stok',            'jumlah', 0],
                [1, 'Stok Minimum', 'stok_minimum',    'jumlah', 0],
                [1, 'Harga Satuan', 'harga_satuan',    'uang',   0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

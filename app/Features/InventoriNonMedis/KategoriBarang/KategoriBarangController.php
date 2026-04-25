<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;
use App\Core\Controller\ControllerTemplate;

final class KategoriBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new KategoriBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Kategori Barang',     'icon' => 'kategori_barang'],
            ],
            judul: 'Kategori Barang',
            modul_path: '/inventori-non-medis/kategori-barang',
            nama_tabel: 'kategori_barang',
            kolom_id: 'id_kategori',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [0, 'ID',                   'id_kategori',          'indeks', 0],
                [0, 'Kode Kategori',        'kode_kategori_barang', 'indeks', 0],
                [1, 'Nama Kategori Barang', 'nama_kategori_barang', 'nama',   1],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID',                   'id_kategori',          'indeks', OPTIONAL],
                [HIDE, 'Kode Kategori',        'kode_kategori_barang', 'indeks', OPTIONAL],
                [SHOW, 'Nama Kategori Barang', 'nama_kategori_barang', 'nama',   REQUIRED],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

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
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori', 'ID'],
                [HIDE, OPTIONAL, I::INDEX, 'kode_kategori_barang', 'Kode Kategori'],
                [SHOW, REQUIRED, I::NAME, 'nama_kategori_barang', 'Nama Kategori Barang'],
            ],
        );
    }
}

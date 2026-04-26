<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

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
            title: 'Kategori Barang',
            action: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori', 'ID'],
                [HIDE, OPTIONAL, I::INDEX, 'kode_kategori_barang', 'Kode Kategori'],
                [SHOW, REQUIRED, I::NAME, 'nama_kategori_barang', 'Nama Kategori Barang'],
            ],
        );
    }
}

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
            new KategoriBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Kategori Barang',     'kategori_barang'],
            ],
            'Kategori Barang',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori', 'ID'],
                [HIDE, OPTIONAL, I::INDEX, 'kode_kategori_barang', 'Kode Kategori'],
                [SHOW, REQUIRED, I::NAME, 'nama_kategori_barang', 'Nama Kategori Barang'],
            ],
        );
    }
}

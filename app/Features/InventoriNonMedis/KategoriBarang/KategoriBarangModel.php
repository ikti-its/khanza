<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KategoriBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_non_medis',
            'kategori_barang',
            'id_kategori',
            [
                'id_kategori' => V::TODO(), 
                'kode_kategori_barang' => V::TODO(),
                'nama_kategori_barang' => V::TODO()
            ],
        );
    }
}
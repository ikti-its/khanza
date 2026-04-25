<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;
use App\Core\Model\ModelTemplate;

final class KategoriBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_non_medis',
            'kategori_barang',
            'id_kategori',
            [
                'id_kategori' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'kode_kategori_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'nama_kategori_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\ModelTemplate;

class PermintaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori',
            'permintaan_barang',
            'id_permintaan',
            [
                'id_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'tanggal' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'status' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
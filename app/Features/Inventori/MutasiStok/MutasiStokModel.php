<?php
declare(strict_types=1);

namespace App\Features\Inventori\MutasiStok;

use App\Core\ModelTemplate;

class MutasiStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori',
            'mutasi_stok',
            'id_mutasi',
            [
                'id_mutasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'id_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'lokasi_sumber' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'lokasi_tujuan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
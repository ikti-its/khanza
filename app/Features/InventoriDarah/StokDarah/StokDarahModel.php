<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;

use App\Core\ModelTemplate;

class StokDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'stok_darah',
            'id_stok_darah',
            [
                'id_stok_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pemisahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'no_kantong' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_komponen' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_golongan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_rhesus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_pengambilan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_kadaluarsa' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_sumber_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_status_stok' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
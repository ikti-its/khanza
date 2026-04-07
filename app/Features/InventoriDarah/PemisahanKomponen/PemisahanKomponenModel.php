<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;

use App\Core\ModelTemplate;

class PemisahanKomponenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'pemisahan_komponen',
            'id_pemisahan',
            [
                'id_pemisahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_pemisahan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_shift' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
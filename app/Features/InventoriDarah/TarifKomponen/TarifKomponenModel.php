<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;

use App\Core\ModelTemplate;

class TarifKomponenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'tarif_komponen',
            'id_tarif',
            [
                'id_tarif' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_komponen' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'jasa_sarana' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'paket_bhp' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kso' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'manajemen' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'pembatalan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_berlaku' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
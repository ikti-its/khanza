<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;

use App\Core\ModelTemplate;

final class HasilUjiSaringModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_uji_saring',
            'id_uji_saring',
            [
                'id_uji_saring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_metode_uji' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_uji' => [
                    'allowed' => true,
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
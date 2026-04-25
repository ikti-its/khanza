<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;

use App\Core\ModelTemplate;

final class KonselingModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'konseling',
            'id_konseling',
            [
                'id_konseling' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_konseling' => [
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
<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;

use App\Core\ModelTemplate;

final class RujukanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'rujukan',
            'id_rujukan',
            [
                'id_rujukan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_surat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_rujukan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_fasyankes' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
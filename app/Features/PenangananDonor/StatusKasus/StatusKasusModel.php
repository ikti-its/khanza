<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;

use App\Core\ModelTemplate;

final class StatusKasusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'status_kasus',
            'id_status_kasus',
            [
                'id_status_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
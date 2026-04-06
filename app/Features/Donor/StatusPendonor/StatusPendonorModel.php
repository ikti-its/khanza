<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;

use App\Core\ModelTemplate;

class StatusPendonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'status_pendonor',
            'id_status_pendonor',
            [
                'id_status_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
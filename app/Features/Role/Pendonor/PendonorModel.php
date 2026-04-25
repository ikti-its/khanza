<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;
use App\Core\Model\ModelTemplate;

final class PendonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'role',
            'pendonor',
            'id_pendonor',
            [
                'id_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_orang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_rhesus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_status_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
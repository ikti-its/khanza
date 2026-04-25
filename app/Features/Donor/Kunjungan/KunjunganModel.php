<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\ModelTemplate;

final class KunjunganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'kunjungan',
            'id_kunjungan',
            [
                'id_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pendonor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_kunjungan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_antrian' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_status_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
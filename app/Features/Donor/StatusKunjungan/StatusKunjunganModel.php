<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;

use App\Core\ModelTemplate;

final class StatusKunjunganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'status_kunjungan',
            'id_status_kunjungan',
            [
                'id_status_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
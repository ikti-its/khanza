<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;

use App\Core\ModelTemplate;

class AlasanKedatanganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'alasan_kedatangan',
            'id_alasan',
            [
                'id_alasan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_alasan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
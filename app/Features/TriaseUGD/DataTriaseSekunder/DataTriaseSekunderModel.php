<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;

use App\Core\ModelTemplate;

class DataTriaseSekunderModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_sekunder',
            'id_triase_sekunder',
            [
                'id_triase_sekunder' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_triase' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'anamnesa_singkat' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'catatan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_plan_sekunder' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_triase' => [
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
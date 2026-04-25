<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Model\ModelTemplate;

final class DataTriasePrimerModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_primer',
            'id_triase_primer',
            [
                'id_triase_primer' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_triase' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keluhan_utama' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kebutuhan_khusus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'catatan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_plan_primer' => [
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
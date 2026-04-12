<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;

use App\Core\ModelTemplate;

class DataTriaseDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_detail',
            'id_triase_detail',
            [
                'id_triase_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_triase' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_skala' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
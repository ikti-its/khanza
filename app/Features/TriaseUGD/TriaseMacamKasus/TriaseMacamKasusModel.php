<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;
use App\Core\Model\ModelTemplate;

final class TriaseMacamKasusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'triase_macam_kasus',
            'id_macam_kasus',
            [
                'id_macam_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_macam_kasus' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_macam_kasus' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
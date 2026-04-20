<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;

use App\Core\ModelTemplate;

class TingkatSkalaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'tingkat_skala',
            'id_tingkat',
            [
                'id_tingkat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_tingkat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
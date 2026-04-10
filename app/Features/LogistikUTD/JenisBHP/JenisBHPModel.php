<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;

use App\Core\ModelTemplate;

class JenisBHPModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'logistik_utd',
            'jenis_bhp',
            'id_jenis_bhp',
            [
                'id_jenis_bhp' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_bhp' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefWarnaUrine;

use App\Core\ModelTemplate;

class RefWarnaUrineModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_warna_urine',
            'id_warna_urine',
            [
                'id_warna_urine' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_warna' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
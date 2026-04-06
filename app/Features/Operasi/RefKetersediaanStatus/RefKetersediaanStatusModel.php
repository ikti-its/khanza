<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;

use App\Core\ModelTemplate;

class RefKetersediaanStatusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_ketersediaan_status',
            'id_ketersediaan_status',
            [
                'id_ketersediaan_status' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_ketersediaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
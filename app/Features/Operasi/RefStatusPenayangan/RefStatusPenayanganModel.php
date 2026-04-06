<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;

use App\Core\ModelTemplate;

class RefStatusPenayanganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_status_penayangan',
            'id_status_penayangan',
            [
                'id_status_penayangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
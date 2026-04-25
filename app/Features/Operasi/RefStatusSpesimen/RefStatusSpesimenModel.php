<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;

use App\Core\ModelTemplate;

final class RefStatusSpesimenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_status_spesimen',
            'id_status_spesimen',
            [
                'id_status_spesimen' => [
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
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;

use App\Core\ModelTemplate;

class RefStatusOperasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_status_operasi',
            'id_status',
            [
                'id_status' => [
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
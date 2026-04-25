<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRencanaAnestesi;

use App\Core\ModelTemplate;

final class RefRencanaAnestesiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_rencana_anestesi',
            'id_rencana_anestesi',
            [
                'id_rencana_anestesi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_rencana' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
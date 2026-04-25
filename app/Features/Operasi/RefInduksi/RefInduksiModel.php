<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;

use App\Core\ModelTemplate;

final class RefInduksiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_induksi',
            'id_induksi',
            [
                'id_induksi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_induksi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
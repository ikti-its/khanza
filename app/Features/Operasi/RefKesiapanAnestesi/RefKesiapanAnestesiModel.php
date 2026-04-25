<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;

use App\Core\ModelTemplate;

final class RefKesiapanAnestesiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_kesiapan_anestesi',
            'id_kesiapan',
            [
                'id_kesiapan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_kesiapan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
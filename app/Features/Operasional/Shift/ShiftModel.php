<?php
declare(strict_types=1);

namespace App\Features\Operasional\Shift;

use App\Core\ModelTemplate;

class ShiftModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasional',
            'shift',
            'id_shift',
            [
                'id_shift' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_shift' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
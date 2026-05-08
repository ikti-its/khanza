<?php
declare(strict_types=1);

namespace App\Features\Operasional\Shift;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ShiftModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasional',
            'shift',
            'id_shift',
            [
                'id_shift' => V::TODO(),
                'nama_shift' => V::TODO()
            ],
        );
    }
}
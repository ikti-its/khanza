<?php
declare(strict_types=1);

namespace App\Features\Operasional\Shift;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateShiftTable extends Template
{
    public function __construct(){
        parent::__construct(
            'operasional',
            'shift',
            [
                'id_shift'         => T::ID8(),
                'nama_shift'       => T::TEXT(),
            ],
            ['id_shift'],
            [['nama_shift']],
            [],
            [],
            true,
            __DIR__ . '/shift.csv'
        );
    }
}

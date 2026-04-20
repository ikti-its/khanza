<?php
declare(strict_types=1);

namespace App\Features\Operasional\Shift;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateShiftTable extends DatabaseTemplate
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
            true,
            __DIR__ . '/shift.csv'
        );
    }
}

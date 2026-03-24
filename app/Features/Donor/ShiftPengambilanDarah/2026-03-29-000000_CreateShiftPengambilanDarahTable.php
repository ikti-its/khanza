<?php
declare(strict_types=1);

namespace App\Features\Donor\ShiftPengambilanDarah;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateShiftPengambilanDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'shift_pengambilan_darah',
            [
                'id_shift_pengambilan'      => T::ID8(),
                'nama_shift'                => T::TEXT(),
            ],
            ['id_shift_pengambilan'],
            [['nama_shift']],
            [],
            [],
            true,
            __DIR__ . '/shift_pengambilan_darah.csv'
        );
    }
}

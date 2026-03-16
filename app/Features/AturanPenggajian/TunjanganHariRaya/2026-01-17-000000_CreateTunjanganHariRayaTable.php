<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\TunjanganHariRaya;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateTunjanganHariRayaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'thr',
            [
                'no_thr'       => T::ID8(),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_thr'],
            [],
            [],
            [],
        );
    }
}

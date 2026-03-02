<?php

namespace App\Features\AturanPenggajian\THR;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateTHRTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'thr',
            [
                'no_thr'        => T::ID8(),
                'masa_kerja'    => T::ID8(),
                'pengali_upah'  => T::F32(),
            ],
            ['no_thr'],
            [],
            [],
            [],
        );
    }
}

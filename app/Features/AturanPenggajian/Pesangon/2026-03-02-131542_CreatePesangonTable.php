<?php

namespace App\Features\AturanPenggajian\Pesangon;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreatePesangonTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pesangon',
            [
                'no_pesangon'  => T::ID8(),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_pesangon'],
            [],
            [],
            [],
        );
    }
}

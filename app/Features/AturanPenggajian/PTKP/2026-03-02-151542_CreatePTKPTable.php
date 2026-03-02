<?php

namespace App\Features\AturanPenggajian\PTKP;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreatePTKPTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'ptkp',
            [
                'no_ptkp'    => T::ID8(),
                'kode_ptkp'  => T::TEXT(),
                'perkawinan' => T::TEXT(),
                'tanggungan' => T::ID8(),
                'nilai_ptkp' => T::ID32(),
            ],
            ['no_pph21'],
            [],
            [],
            [],
        );
    }
}

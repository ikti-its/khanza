<?php

namespace App\Features\AturanPenggajian\UangPenghargaanMasaKerja;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateUangPenghargaanMasaKerjaTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upmk',
            [
                'no_upmk'      => T::ID8(),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_upmk'],
            [],
            [],
            [],
        );
    }
}

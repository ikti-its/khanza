<?php

namespace App\Features\AturanPenggajian\Jabatan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateLemburTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'lembur',
            [
                'no_lembur'    => T::ID8(),
                'jenis_lembur' => T::TEXT(),
                'jam_lembur'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_lembur'],
            [['jenis_lembur', 'jam_lembur']],
            [],
            []
        );
    }
}

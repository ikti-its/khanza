<?php

namespace App\Database\Migrations;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateBPJSTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'bpjs',
            [
                'no_bpjs'       => T::ID8(),
                'nama_program'  => T::TEXT(),
                'penyelenggara' => T::TEXT(),
                'tarif'         => T::F64(),
                'batas_atas'    => T::F64(),
                'batas_bawah'   => T::F64(),
            ],
            ['no_bpjs'],
        );
    }
}

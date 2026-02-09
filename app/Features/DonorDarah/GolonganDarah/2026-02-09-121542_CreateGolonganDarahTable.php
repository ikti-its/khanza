<?php

namespace App\Database\Migrations;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateGolonganDarahTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'golongan_darah',
            [
                'id_golongandarah'      => T::ID8(),
                'nama_golongandarah'    => T::TEXT(),
                'rhesus'                => T::TEXT(),
            ],
            ['id_golongandarah'],
        );
    }
}

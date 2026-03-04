<?php

namespace App\Features\Darah\GolonganDarah;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateGolonganDarahTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'golongan_darah',
            [
                'id_golongan_darah'      => T::ID8(),
                'nama_golongan_darah'    => T::TEXT(),
            ],
            ['id_golongan_darah'],
            [['nama_golongan_darah']],
        );
    }
}

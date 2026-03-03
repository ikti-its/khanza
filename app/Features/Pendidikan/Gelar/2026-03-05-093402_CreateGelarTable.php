<?php

namespace App\Features\Pendidikan\Gelar;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
class CreateGelarTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'gelar',
            [
                'id_gelar'   => T::ID8(),
                'nama_gelar' => T::TEXT(),
            ],
            ['id_gelar'],
            [['nama_gelar']],
            [],
            [],
        );
    }
}

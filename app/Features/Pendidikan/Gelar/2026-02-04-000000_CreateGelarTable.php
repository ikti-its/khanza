<?php

namespace App\Features\Pendidikan\Gelar;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateGelarTable extends DatabaseTemplate
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

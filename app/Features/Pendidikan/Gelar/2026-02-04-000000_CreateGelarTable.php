<?php

namespace App\Features\Pendidikan\Gelar;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateGelarTable extends Template
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

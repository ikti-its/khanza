<?php

namespace App\Features\Person\Agama;

use App\Core\DatabaseTemplate;
use App\Core\DBType as T;

class CreateAgamaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'agama',
            [
                'id_agama'   => T::ID8(),
                'nama_agama' => T::TEXT(),
            ],
            ['id_agama'],
            [['nama_agama']],
            [],
            [],
            true,
            __DIR__ . '/agama.csv'
        );
    }
}

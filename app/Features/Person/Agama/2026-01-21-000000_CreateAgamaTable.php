<?php

namespace App\Features\Person\Agama;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateAgamaTable extends Template
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

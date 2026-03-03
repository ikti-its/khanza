<?php

namespace App\Features\Person\Agama;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateAgamaTable extends MigrationTemplate
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
        );
    }
}

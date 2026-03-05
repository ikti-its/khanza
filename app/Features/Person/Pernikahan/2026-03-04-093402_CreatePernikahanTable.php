<?php

namespace App\Features\Person\Pernikahan;

use App\Core\DatabaseTemplate;
use App\Core\DBType as T;

class CreatePernikahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'pernikahan',
            [
                'id_pernikahan'   => T::ID8(),
                'nama_pernikahan' => T::TEXT(),
            ],
            ['id_pernikahan'],
            [['nama_pernikahan']],
            [],
            [],
        );
    }
}

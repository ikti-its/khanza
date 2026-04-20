<?php

namespace App\Features\Person\Pernikahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePernikahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'pernikahan',
            [
                'id_pernikahan'   => T::ID8(),
                'status_pernikahan' => T::TEXT(),
            ],
            ['id_pernikahan'],
            [['status_pernikahan']],
            [],
            true,
            __DIR__ . '/pernikahan.csv'
        );
    }
}

<?php

namespace App\Features\Person\Pernikahan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePernikahanTable extends Template
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

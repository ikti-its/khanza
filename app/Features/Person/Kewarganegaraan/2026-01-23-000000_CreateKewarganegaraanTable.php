<?php

namespace App\Features\Person\Kewarganegaraan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateKewarganegaraanTable extends Template
{
    public function __construct(){
        parent::__construct(
            'person',
            'kewarganegaraan',
            [
                'id_kewarganegaraan' => T::ID8(),
                'id_negara'          => T::ID8(),
            ],
            ['id_kewarganegaraan'],
            [],
            [
                [['id_negara'], 'lokasi.negara', ['id_negara'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

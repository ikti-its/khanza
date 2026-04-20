<?php

namespace App\Features\Person\Kewarganegaraan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKewarganegaraanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'kewarganegaraan',
            [
                'id_kewarganegaraan' => T::ID8(),
                'id_negara'          => T::INT8(),
            ],
            ['id_kewarganegaraan'],
            [],
            [
                [['id_negara'], 'lokasi.negara', ['id_negara'], 'CASCADE', 'CASCADE'],
            ],
        );
    }
}

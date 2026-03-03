<?php

namespace App\Features\Person\Kewarganegaraan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateKewarganegaraanTable extends MigrationTemplate
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

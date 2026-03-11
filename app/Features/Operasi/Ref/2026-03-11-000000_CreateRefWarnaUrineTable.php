<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefWarnaUrineTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_warna_urine',
        [
            'id_warna_urine' => T::ID8(),
            'nama_warna'     => T::TEXT(),
        ],
        ['id_warna_urine'],
        [],
        [],
        [],
        true,
        __DIR__ . '/warna_urine.csv'
    );
}
}

<?php

namespace App\Features\Operasi\RefWarnaUrine;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefWarnaUrineTable extends Template
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

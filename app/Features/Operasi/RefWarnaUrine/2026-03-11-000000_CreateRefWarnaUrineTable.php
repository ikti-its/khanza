<?php

namespace App\Features\Operasi\RefWarnaUrine;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefWarnaUrineTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_warna_urine',
        [
            'id_warna_urine' => T::ID8(),
            'nama_warna'     => T::TEXT(),
        ],
        'id_warna_urine',
        [],
        [],
        true,
        __DIR__ . '/warna_urine.csv'
    );
}
}

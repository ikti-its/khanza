<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefMetodeRacikTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_metode_racik',
        [
            'id_metode'    => T::ID8(),
            'kode_racik'   => T::TEXT(),
            'metode_racik' => T::TEXT(),
        ],
        ['id_metode'],
        [['kode_racik']],
        [],
        [],
        true,
        __DIR__ . '/metode_racik.csv'
    );
}
}

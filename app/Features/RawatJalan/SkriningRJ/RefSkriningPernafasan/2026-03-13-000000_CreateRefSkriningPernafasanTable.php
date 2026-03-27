<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefSkriningPernafasanTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_pernafasan',
        [
            'id_pernafasan' => T::ID8(),
            'pernafasan'    => T::TEXT(),
        ],
        ['id_pernafasan'],
        [],
        [],
        [],
        true,
        __DIR__ . '/skrining_pernafasan.csv'
    );
}
}

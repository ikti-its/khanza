<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefSkriningPernafasanTable extends Template
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

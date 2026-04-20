<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefSkriningPernafasanTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_pernafasan',
        [
            'id_pernafasan' => T::ID8(),
            'pernafasan'    => T::TEXT(),
        ],
        'id_pernafasan',
        [],
        [],
        true,
        __DIR__ . '/skrining_pernafasan.csv'
    );
}
}

<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningNyeriDada;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefSkriningNyeriDadaTable extends Template
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_nyeri_dada',
        [
            'id_nyeri_dada' => T::ID8(),
            'nyeri_dada'    => T::TEXT(),
        ],
        ['id_nyeri_dada'],
        [],
        [],
        [],
        true,
        __DIR__ . '/skrining_nyeri_dada.csv'
    );
}
}

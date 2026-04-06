<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningBatuk;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefSkriningBatukTable extends Template
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_batuk',
        [
            'id_batuk'      => T::ID8(),
            'kategori_batuk'=> T::TEXT(),
        ],
        ['id_batuk'],
        [],
        [],
        [],
        true,
        __DIR__ . '/skrining_batuk.csv'
    );
}
}

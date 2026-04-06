<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefSkriningKesadaranTable extends Template
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_kesadaran',
        [
            'id_kesadaran' => T::ID8(),
            'kesadaran'    => T::TEXT(),
        ],
        ['id_kesadaran'],
        [],
        [],
        [],
        true,
        __DIR__ . '/skrining_kesadaran.csv'
    );
}
}

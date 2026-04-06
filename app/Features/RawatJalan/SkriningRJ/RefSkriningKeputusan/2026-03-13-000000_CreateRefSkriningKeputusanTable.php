<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefSkriningKeputusanTable extends Template
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_keputusan',
        [
            'id_keputusan'       => T::ID8(),
            'skrining_keputusan' => T::TEXT(),
        ],
        ['id_keputusan'],
        [],
        [],
        [],
        true,
        __DIR__ . '/skrining_keputusan.csv'
    );
}
}

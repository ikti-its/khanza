<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefSkriningKeputusanTable extends DatabaseTemplate
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

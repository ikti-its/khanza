<?php

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefSkriningSkalaNyeriTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_skala_nyeri',
        [
            'id_skala_nyeri' => T::ID8(),
            'skala_nyeri'    => T::TEXT(),
        ],
        'id_skala_nyeri',
        [],
        [],
        true,
        __DIR__ . '/skrining_skala_nyeri.csv'
    );
}
}

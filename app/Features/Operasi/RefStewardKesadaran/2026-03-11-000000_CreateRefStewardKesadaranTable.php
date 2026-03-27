<?php

namespace App\Features\Operasi\RefStewardKesadaran;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefStewardKesadaranTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_steward_kesadaran',
        [
            'id_kesadaran' => T::ID8(),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::INT8(),
        ],
        ['id_kesadaran'],
        [],
        [],
        [],
        true,
        __DIR__ . '/steward_kesadaran.csv'
    );
}
}

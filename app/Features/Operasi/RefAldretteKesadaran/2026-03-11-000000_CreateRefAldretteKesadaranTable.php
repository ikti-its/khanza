<?php

namespace App\Features\Operasi\RefAldretteKesadaran;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefAldretteKesadaranTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_kesadaran',
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
        __DIR__ . '/aldrette_kesadaran.csv'
    );
}
}

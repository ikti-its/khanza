<?php

namespace App\Features\Operasi\RefKesadaran;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefKesadaranTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_kesadaran',
        [
            'id_kesadaran'   => T::ID8(),
            'nama_kesadaran' => T::TEXT(),
        ],
        ['id_kesadaran'],
        [],
        [],
        [],
        true,
        __DIR__ . '/kesadaran.csv'
    );
}
}

<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefKesadaranTable extends DatabaseTemplate
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

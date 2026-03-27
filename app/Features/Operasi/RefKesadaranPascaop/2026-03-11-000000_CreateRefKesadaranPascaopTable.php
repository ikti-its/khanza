<?php

namespace App\Features\Operasi\RefKesadaranPascaop;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefKesadaranPascaopTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_kesadaran_pascaop',
        [
            'id_kesadaran'   => T::ID8(),
            'nama_kesadaran' => T::TEXT(),
        ],
        ['id_kesadaran'],
        [],
        [],
        [],
        true,
        __DIR__ . '/kesadaran_pascaop.csv'
    );
}
}

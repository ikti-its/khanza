<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefStewardMotorikTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_steward_motorik',
        [
            'id_motorik'  => T::ID8(),
            'nama_skala'  => T::TEXT(),
            'nilai'       => T::INT8(),
        ],
        ['id_motorik'],
        [],
        [],
        [],
        true,
        __DIR__ . '/steward_motorik.csv'
    );
}
}

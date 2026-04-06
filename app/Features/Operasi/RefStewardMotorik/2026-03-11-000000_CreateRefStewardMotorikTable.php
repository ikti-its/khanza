<?php

namespace App\Features\Operasi\RefStewardMotorik;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStewardMotorikTable extends Template
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

<?php

namespace App\Features\Operasi\RefStatusSpesimen;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStatusSpesimenTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_status_spesimen',
        [
            'id_status_spesimen' => T::ID8(),
            'nama_status'        => T::TEXT(),
        ],
        ['id_status_spesimen'],
        [],
        [],
        [],
        true,
        __DIR__ . '/status_spesimen.csv'
    );
}
}

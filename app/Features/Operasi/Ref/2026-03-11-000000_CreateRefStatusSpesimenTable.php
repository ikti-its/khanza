<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefStatusSpesimenTable extends DatabaseTemplate
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

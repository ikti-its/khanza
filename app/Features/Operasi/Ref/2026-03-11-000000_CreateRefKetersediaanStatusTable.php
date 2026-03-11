<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefKetersediaanStatusTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_ketersediaan_status',
        [
            'id_ketersediaan_status' => T::ID8(),
            'nama_ketersediaan'      => T::TEXT(),
        ],
        ['id_ketersediaan_status'],
        [],
        [],
        [],
        true,
        __DIR__ . '/ketersediaan_status.csv'
    );
}
}

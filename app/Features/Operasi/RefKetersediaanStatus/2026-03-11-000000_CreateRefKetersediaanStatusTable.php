<?php

namespace App\Features\Operasi\RefKetersediaanStatus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
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

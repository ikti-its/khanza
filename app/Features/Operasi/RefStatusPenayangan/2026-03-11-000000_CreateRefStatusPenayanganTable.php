<?php

namespace App\Features\Operasi\RefStatusPenayangan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefStatusPenayanganTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_status_penayangan',
        [
            'id_status_penayangan' => T::ID8(),
            'nama_status'          => T::TEXT(),
        ],
        ['id_status_penayangan'],
        [],
        [],
        [],
        true,
        __DIR__ . '/status_penayangan.csv'
    );
}
}

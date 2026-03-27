<?php

namespace App\Features\Operasi\RefRencanaAnestesi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefRencanaAnestesiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_rencana_anestesi',
        [
            'id_rencana_anestesi' => T::ID8(),
            'nama_rencana'        => T::TEXT(),
        ],
        ['id_rencana_anestesi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/rencana_anestesi.csv'
    );
}
}

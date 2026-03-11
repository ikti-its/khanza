<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefAldretteRespirasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_respirasi',
        [
            'id_respirasi' => T::ID8(),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::INT8(),
        ],
        ['id_respirasi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/aldrette_respirasi.csv'
    );
}
}

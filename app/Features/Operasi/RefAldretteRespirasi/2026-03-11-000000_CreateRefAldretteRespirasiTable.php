<?php

namespace App\Features\Operasi\RefAldretteRespirasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefAldretteRespirasiTable extends DatabaseTemplate
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
        'id_respirasi',
        [],
        [],
        true,
        __DIR__ . '/aldrette_respirasi.csv'
    );
}
}

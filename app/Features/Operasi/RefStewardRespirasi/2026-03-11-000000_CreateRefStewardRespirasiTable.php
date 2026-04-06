<?php

namespace App\Features\Operasi\RefStewardRespirasi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStewardRespirasiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_steward_respirasi',
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
        __DIR__ . '/steward_respirasi.csv'
    );
}
}

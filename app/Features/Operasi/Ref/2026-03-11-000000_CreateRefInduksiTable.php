<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefInduksiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_induksi',
        [
            'id_induksi'   => T::ID8(),
            'nama_induksi' => T::TEXT(),
        ],
        ['id_induksi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/induksi.csv'
    );
}
}

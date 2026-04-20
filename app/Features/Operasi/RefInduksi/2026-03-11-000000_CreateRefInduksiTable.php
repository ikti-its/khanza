<?php

namespace App\Features\Operasi\RefInduksi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefInduksiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_induksi',
        [
            'id_induksi'   => T::ID8(),
            'nama_induksi' => T::TEXT(),
        ],
        'id_induksi',
        [],
        [],
        true,
        __DIR__ . '/induksi.csv'
    );
}
}

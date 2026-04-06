<?php

namespace App\Features\Operasi\RefKesiapanAnestesi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefKesiapanAnestesiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_kesiapan_anestesi',
        [
            'id_kesiapan'   => T::ID8(),
            'nama_kesiapan' => T::TEXT(),
        ],
        ['id_kesiapan'],
        [],
        [],
        [],
        true,
        __DIR__ . '/kesiapan_anestesi.csv'
    );
}
}

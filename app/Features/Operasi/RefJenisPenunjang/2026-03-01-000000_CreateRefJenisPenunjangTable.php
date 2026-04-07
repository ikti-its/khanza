<?php

namespace App\Features\Operasi\RefJenisPenunjang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefJenisPenunjangTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_jenis_penunjang',
        [
            'id_jenis_penunjang' => T::ID8(),
            'nama_jenis'         => T::TEXT(),
        ],
        ['id_jenis_penunjang'],
        [],
        [],
        [],
        true,
        __DIR__ . '/jenis_penunjang.csv'
    );
}
}

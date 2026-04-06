<?php

namespace App\Features\Operasi\RefStatusOperasi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStatusOperasiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_status_operasi',
        [
            'id_status'   => T::ID8(),
            'nama_status' => T::TEXT(),
        ],
        ['id_status'],
        [],
        [],
        [],
        true,
        __DIR__ . '/status_operasi.csv'
    );
}
}

<?php

namespace App\Features\Operasi\RefAngkaAsa;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefAngkaAsaTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_angka_asa',
        [
            'id_asa'   => T::ID8(),
            'nama_asa' => T::TEXT(),
        ],
        ['id_asa'],
        [],
        [],
        [],
        true,
        __DIR__ . '/angka_asa.csv'
    );
}
}

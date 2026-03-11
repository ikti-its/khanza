<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefKeadaanUmumTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_keadaan_umum',
        [
            'id_keadaan_umum' => T::ID8(),
            'nama_keadaan'    => T::TEXT(),
        ],
        ['id_keadaan_umum'],
        [],
        [],
        [],
        true,
        __DIR__ . '/keadaan_umum.csv'
    );
}
}

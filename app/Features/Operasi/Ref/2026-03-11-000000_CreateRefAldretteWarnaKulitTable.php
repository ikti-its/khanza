<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefAldretteWarnaKulitTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_warna_kulit',
        [
            'id_warna'   => T::ID8(),
            'nama_skala' => T::TEXT(),
            'nilai'      => T::INT8(),
        ],
        ['id_warna'],
        [],
        [],
        [],
        true,
        __DIR__ . '/aldrette_warna_kulit.csv'
    );
}
}

<?php

namespace App\Features\Operasi\RefAldretteWarnaKulit;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefAldretteWarnaKulitTable extends Template
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

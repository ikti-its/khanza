<?php

namespace App\Features\Operasi\RefBromage;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefBromageTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_bromage',
        [
            'id_bromage'   => T::ID8(),
            'nama_skala'   => T::TEXT(),
            'tingkat_blok' => T::TEXT(),
            'nilai'        => T::INT8(),
            'gambar'       => T::TEXT()->nullable(),
        ],
        ['id_bromage'],
        [],
        [],
        [],
        true,
        __DIR__ . '/bromage.csv'
    );
}
}

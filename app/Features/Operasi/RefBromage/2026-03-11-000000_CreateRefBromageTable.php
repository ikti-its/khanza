<?php

namespace App\Features\Operasi\RefBromage;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefBromageTable extends DatabaseTemplate
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

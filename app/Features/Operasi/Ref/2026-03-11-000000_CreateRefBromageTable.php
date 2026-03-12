<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefAldretteAktivitasTable extends DatabaseTemplate
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

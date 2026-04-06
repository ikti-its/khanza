<?php

namespace App\Features\Operasi\RefAldretteAktivitas;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefAldretteAktivitasTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_aktivitas',
        [
            'id_aktivitas' => T::ID8(),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::INT8(),
        ],
        ['id_aktivitas'],
        [],
        [],
        [],
        true,
        __DIR__ . '/aldrette_aktivitas.csv'
    );
}
}

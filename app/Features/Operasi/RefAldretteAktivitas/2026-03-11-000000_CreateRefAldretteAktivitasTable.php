<?php

namespace App\Features\Operasi\RefAldretteAktivitas;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefAldretteAktivitasTable extends DatabaseTemplate
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

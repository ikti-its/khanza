<?php

namespace App\Features\Operasi\RefIndikasiPindah;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefIndikasiPindahTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_indikasi_pindah',
        [
            'id_indikasi'   => T::ID8(),
            'nama_indikasi' => T::TEXT(),
        ],
        ['id_indikasi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/indikasi_pindah.csv'
    );
}
}

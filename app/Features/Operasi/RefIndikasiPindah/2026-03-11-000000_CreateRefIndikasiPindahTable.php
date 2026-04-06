<?php

namespace App\Features\Operasi\RefIndikasiPindah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefIndikasiPindahTable extends Template
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

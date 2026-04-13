<?php

namespace App\Features\Operasi\RefJenisSedasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefJenisSedasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_jenis_sedasi',
        [
            'id_jenis_sedasi' => T::ID8(),
            'nama_sedasi'     => T::TEXT(),
        ],
        ['id_jenis_sedasi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/jenis_sedasi.csv'
    );
}
}

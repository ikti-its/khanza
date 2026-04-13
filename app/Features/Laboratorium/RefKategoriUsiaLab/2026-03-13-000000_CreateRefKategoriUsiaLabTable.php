<?php

namespace App\Features\Laboratorium\RefKategoriUsiaLab;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefKategoriUsiaLabTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_kategori_usia_lab',
        [
            'id_kategori_usia'   => T::ID8(),
            'nama_kategori_usia' => T::TEXT(),
        ],
        ['id_kategori_usia'],
        [],
        [],
        [],
        true,
        __DIR__ . '/kategori_usia_lab.csv'
    );
}
}

<?php

namespace App\Features\Laboratorium\RefKategoriLab;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefKategoriLabTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_kategori_lab',
        [
            'id_kategori'   => T::ID8(),
            'kode_kategori' => T::TEXT(),
            'nama_kategori' => T::TEXT(),
        ],
        ['id_kategori'],
        [['kode_kategori']],
        [],
        [],
        true,
        __DIR__ . '/kategori_lab.csv'
    );
}
}

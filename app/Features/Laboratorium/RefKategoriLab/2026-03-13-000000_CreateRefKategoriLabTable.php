<?php

namespace App\Features\Laboratorium\RefKategoriLab;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefKategoriLabTable extends Template
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

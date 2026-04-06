<?php

namespace App\Features\Operasi\RefObatBebas;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefObatBebasTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_obat_bebas',
        [
            'id_obat_bebas'  => T::ID8(),
            'nama_kategori'  => T::TEXT(),
        ],
        ['id_obat_bebas'],
        [],
        [],
        [],
        true,
        __DIR__ . '/obat_bebas.csv'
    );
}
}

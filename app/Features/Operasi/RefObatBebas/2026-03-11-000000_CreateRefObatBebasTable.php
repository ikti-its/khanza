<?php

namespace App\Features\Operasi\RefObatBebas;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateRefObatBebasTable extends DatabaseTemplate
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

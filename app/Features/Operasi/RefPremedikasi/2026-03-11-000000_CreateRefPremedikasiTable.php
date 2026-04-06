<?php

namespace App\Features\Operasi\RefPremedikasi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefPremedikasiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_premedikasi',
        [
            'id_premedikasi'   => T::ID8(),
            'nama_premedikasi' => T::TEXT(),
        ],
        ['id_premedikasi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/premedikasi.csv'
    );
}
}

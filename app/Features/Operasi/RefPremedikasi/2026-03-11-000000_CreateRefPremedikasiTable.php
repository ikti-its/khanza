<?php

namespace App\Features\Operasi\RefPremedikasi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefPremedikasiTable extends DatabaseTemplate
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

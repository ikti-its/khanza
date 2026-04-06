<?php

namespace App\Features\Operasi\RefAldretteTekananDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefAldretteTekananDarahTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_tekanan_darah',
        [
            'id_td'      => T::ID8(),
            'nama_skala' => T::TEXT(),
            'nilai'      => T::INT8(),
        ],
        ['id_td'],
        [],
        [],
        [],
        true,
        __DIR__ . '/aldrette_tekanan_darah.csv'
    );
}
}

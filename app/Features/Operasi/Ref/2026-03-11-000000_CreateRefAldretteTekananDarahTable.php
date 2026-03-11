<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefAldretteTekananDarahTable extends DatabaseTemplate
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

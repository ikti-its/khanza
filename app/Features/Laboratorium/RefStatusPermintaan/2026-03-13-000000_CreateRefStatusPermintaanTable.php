<?php

namespace App\Features\Laboratorium\RefStatusPermintaan;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefStatusPermintaanTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_status_permintaan',
        [
            'id_status'   => T::ID8(),
            'nama_status' => T::TEXT(),
        ],
        ['id_status'],
        [],
        [],
        [],
        true,
        __DIR__ . '/status_permintaan.csv'
    );
}
}

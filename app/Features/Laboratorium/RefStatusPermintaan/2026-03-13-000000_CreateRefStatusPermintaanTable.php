<?php

namespace App\Features\Laboratorium\RefStatusPermintaan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStatusPermintaanTable extends Template
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

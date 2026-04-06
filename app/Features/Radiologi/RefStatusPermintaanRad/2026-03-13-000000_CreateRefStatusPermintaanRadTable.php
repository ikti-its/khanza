<?php

namespace App\Features\Radiolgi\RefStatusPermintaanRad;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefStatusPermintaanRadTable extends Template
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_status_permintaan_rad',
        [
            'id_status'   => T::ID8(),
            'nama_status' => T::TEXT(),
        ],
        ['id_status'],
        [],
        [],
        [],
        true,
        __DIR__ . '/status_permintaan_rad.csv'
    );
}
}

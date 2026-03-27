<?php

namespace App\Features\Radiolgi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefStatusPermintaanRadTable extends DatabaseTemplate
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

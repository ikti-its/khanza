<?php

namespace App\Features\Operasi\RefHubunganKeluarga;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefHubunganKeluargaTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_hubungan_keluarga',
        [
            'id_hubungan_keluarga' => T::ID8(),
            'nama_hubungan'        => T::TEXT(),
        ],
        ['id_hubungan_keluarga'],
        [],
        [],
        [],
        true,
        __DIR__ . '/hubungan_keluarga.csv'
    );
}
}

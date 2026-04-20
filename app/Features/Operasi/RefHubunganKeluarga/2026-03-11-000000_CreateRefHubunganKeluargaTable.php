<?php

namespace App\Features\Operasi\RefHubunganKeluarga;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefHubunganKeluargaTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_hubungan_keluarga',
        [
            'id_hubungan_keluarga' => T::ID8(),
            'nama_hubungan'        => T::TEXT(),
        ],
        'id_hubungan_keluarga',
        [],
        [],
        true,
        __DIR__ . '/hubungan_keluarga.csv'
    );
}
}

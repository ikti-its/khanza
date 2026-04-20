<?php

namespace App\Features\Operasi\RefRuanganOperasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefRuanganOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_ruangan_operasi',
        [
            'id_ruangan'   => T::ID8(),
            'kode_ruangan' => T::TEXT(),
            'nama_ruangan' => T::TEXT(),
        ],
        'id_ruangan',
        'kode_ruangan',
        [],
        false,
        __DIR__ . '/ruangan_operasi.csv'
    );
}
}

<?php

namespace App\Features\Operasi\RefRuanganOperasi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefRuanganOperasiTable extends DatabaseTemplate
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
        ['id_ruangan'],
        [['kode_ruangan']],
        [],
        [],
        true,
        __DIR__ . '/ruangan_operasi.csv'
    );
}
}

<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefTindakanOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_tindakan_operasi',
        [
            'id_tindakan'  => T::ID8(),
            'kode_paket'   => T::TEXT(),
            'nama_operasi' => T::TEXT(),
            'tarif'        => T::F32(),
        ],
        ['id_tindakan'],
        [['kode_paket']],
        [],
        [],
        true,
        __DIR__ . '/tindakan_operasi.csv'
    );
}
}

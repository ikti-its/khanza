<?php

namespace App\Features\Operasi\RefPosisiPasien;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefPosisiPasienTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_posisi_pasien',
        [
            'id_posisi'   => T::ID8(),
            'nama_posisi' => T::TEXT(),
        ],
        ['id_posisi'],
        [],
        [],
        [],
        true,
        __DIR__ . '/posisi_pasien.csv'
    );
}
}

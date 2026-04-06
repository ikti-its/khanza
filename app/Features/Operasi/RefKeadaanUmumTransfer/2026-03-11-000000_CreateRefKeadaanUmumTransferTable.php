<?php

namespace App\Features\Operasi\RefKeadaanUmumTransfer;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefKeadaanUmumTransferTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_keadaan_umum_transfer',
        [
            'id_keadaan_umum' => T::ID8(),
            'nama_keadaan'    => T::TEXT(),
        ],
        ['id_keadaan_umum'],
        [],
        [],
        [],
        true,
        __DIR__ . '/keadaan_umum_transfer.csv'
    );
}
}

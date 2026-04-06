<?php

namespace App\Features\Operasi\RefMetodeTransfer;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefMetodeTransferTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_metode_transfer',
        [
            'id_metode'   => T::ID8(),
            'nama_metode' => T::TEXT(),
        ],
        ['id_metode'],
        [],
        [],
        [],
        true,
        __DIR__ . '/metode_transfer.csv'
    );
}
}

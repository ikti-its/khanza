<?php

namespace App\Features\Operasi\RefMetodeTransfer;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateRefMetodeTransferTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_metode_transfer',
        [
            'id_metode'   => T::ID8(),
            'nama_metode' => T::TEXT(),
        ],
        'id_metode',
        [],
        [],
        true,
        __DIR__ . '/metode_transfer.csv'
    );
}
}

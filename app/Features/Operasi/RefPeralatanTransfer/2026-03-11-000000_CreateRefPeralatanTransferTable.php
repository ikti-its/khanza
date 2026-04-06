<?php

namespace App\Features\Operasi\RefPeralatanTransfer;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefPeralatanTransferTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_peralatan_transfer',
        [
            'id_peralatan'   => T::ID8(),
            'nama_peralatan' => T::TEXT(),
        ],
        ['id_peralatan'],
        [],
        [],
        [],
        true,
        __DIR__ . '/peralatan_transfer.csv'
    );
}
}

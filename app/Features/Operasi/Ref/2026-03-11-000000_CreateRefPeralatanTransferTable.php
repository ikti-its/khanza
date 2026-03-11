<?php

namespace App\Features\Operasi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefPeralatanTransferTable extends DatabaseTemplate
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

<?php

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateTimeOutSebelumInsisiPenunjangTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'time_out_sebelum_insisi_penunjang',
        [
            'id_penunjang'    => T::ID8(),
            'id_timeout'      => T::ID8(),
            'jenis_penunjang' => T::TEXT(),
            'id_status'       => T::ID8(),
        ],
        ['id_penunjang'],
        [],
        [
            [['id_timeout'], 'operasi.time_out_sebelum_insisi', ['id_timeout'], 'CASCADE', 'CASCADE'],
            [['id_status'], 'operasi.ref_status_penayangan', ['id_status_penayangan'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_timeout']]
    );
}
}

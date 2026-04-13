<?php

namespace App\Features\Operasi\ChecklistPostopPenunjang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateChecklistPostopPenunjangTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop_penunjang',
        [
            'id_penunjang'      => T::ID8(),
            'id_checklist_post' => T::INT8(),
            'jenis_penunjang'   => T::TEXT(),
            'id_ketersediaan'   => T::INT8(),
            'keterangan'        => T::TEXT(),
        ],
        ['id_penunjang'],
        [],
        [
            [['id_checklist_post'], 'operasi.checklist_postop', ['id_checklist_post'], 'CASCADE', 'CASCADE'],
            [['id_ketersediaan'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_checklist_post']]
    );
}
}

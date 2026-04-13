<?php

namespace App\Features\Operasi\ChecklistPreOperasiPenunjang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateChecklistPreOperasiPenunjangTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_pre_operasi_penunjang',
        [
            'id_penunjang'    => T::ID8(),
            'id_checklist'    => T::INT8(),
            'jenis_penunjang' => T::TEXT(),
            'id_ketersediaan' => T::INT8(),
            'keterangan'      => T::TEXT(),
        ],
        ['id_penunjang'],
        [],
        [
            [['id_checklist'], 'operasi.checklist_pre_operasi', ['id_checklist'], 'CASCADE', 'CASCADE'],
            [['id_ketersediaan'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_checklist']]
    );
}
}

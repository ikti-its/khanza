<?php

namespace App\Features\Operasi\ChecklistPostopDrain;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateChecklistPostopDrainTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop_drain',
        [
            'id_drain'           => T::ID8(),
            'id_checklist_post'  => T::ID8(),
            'id_ketersediaan'    => T::ID8(),
            'jumlah'             => T::INT32(),
            'letak'              => T::TEXT(),
            'warna'              => T::TEXT(),
        ],
        ['id_drain'],
        [],
        [
            [['id_checklist_post'], 'operasi.checklist_postop', ['id_checklist_post'], 'CASCADE', 'CASCADE'],
            [['id_ketersediaan'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_checklist_post']]
    );
}
}

<?php

namespace App\Features\Operasi\ChecklistPostopDrain;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateChecklistPostopDrainTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop_drain',
        [
            'id_drain'           => T::ID8(),
            'id_checklist_post'  => T::INT8(),
            'id_ketersediaan'    => T::INT8(),
            'jumlah'             => T::INT32(),
            'letak'              => T::TEXT(),
            'warna'              => T::TEXT(),
        ],
        'id_drain',
        [],
        [
            ['id_checklist_post', 'operasi.checklist_postop', 'id_checklist_post'],
            ['id_ketersediaan', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
        ],
    );
}
}

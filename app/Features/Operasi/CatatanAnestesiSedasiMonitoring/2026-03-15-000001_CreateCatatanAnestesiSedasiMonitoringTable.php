<?php

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateCatatanAnestesiSedasiMonitoringTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'catatan_anestesi_sedasi_monitoring',
        [
            'id_monitoring'       => T::ID8(),
            'id_catatan_anestesi' => T::INT8(),
            'nama_monitoring'     => T::TEXT(),
            'is_digunakan'        => T::BOOL(),
            'keterangan'          => T::TEXT(),
        ],
        ['id_monitoring'],
        [],
        [
            [['id_catatan_anestesi'], 'operasi.catatan_anestesi_sedasi', ['id_catatan_anestesi'], 'CASCADE', 'CASCADE'],
        ],
        [['id_catatan_anestesi']]
    );
}
}

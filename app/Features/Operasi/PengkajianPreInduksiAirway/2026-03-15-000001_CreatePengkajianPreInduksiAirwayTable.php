<?php

namespace App\Features\Operasi\PengkajianPreInduksiAirway;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreatePengkajianPreInduksiAirwayTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_pre_induksi_airway',
        [
            'id_airway'     => T::ID8(),
            'id_pengkajian' => T::INT8(),
            'jenis_airway'  => T::TEXT(),
            'nomor'         => T::TEXT(),
            'jenis'         => T::TEXT(),
            'fiksasi_cm'    => T::INT8(),
            'keterangan'    => T::TEXT(),
        ],
        ['id_airway'],
        [],
        [
            [['id_pengkajian'], 'operasi.pengkajian_pre_induksi', ['id_pengkajian'], 'CASCADE', 'CASCADE'],
        ],
        [['id_pengkajian']]
    );
}
}

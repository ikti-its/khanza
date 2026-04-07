<?php

namespace App\Features\Radiolgi\HasilRadBhp;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateHasilRadBhpTable extends Template
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad_bhp',
        [
            'id_rad_bhp'     => T::ID64(),
            'id_hasil_rad'   => T::INT64(),
            'id_barang_medis'=> T::UUID(),
            'jumlah_pakai'   => T::F32(),
            'satuan'         => T::TEXT(),
            'harga_satuan'   => T::F32(),
        ],
        ['id_rad_bhp'],
        [],
        [
            [['id_hasil_rad'], 'radiologi.hasil_rad', ['id_hasil_rad'], 'CASCADE', 'CASCADE'],
            // [['id_barang_medis'], 'sik.barang_medis_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_hasil_rad']]
    );
}
}

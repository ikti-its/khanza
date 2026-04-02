<?php

namespace App\Features\Radiolgi\HasilRadBhp;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateHasilRadBhpTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad_bhp',
        [
            'id_rad_bhp'     => T::ID64(),
            'id_hasil_rad'   => T::ID64(),
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

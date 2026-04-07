<?php

namespace App\Features\Operasi\PenyerahanPasienPeralatan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreatePenyerahanPasienPeralatanTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'penyerahan_pasien_peralatan',
        [
            'id'             => T::ID8(),
            'id_penyerahan'  => T::INT8(),
            'id_peralatan'   => T::INT8(),
            'keterangan'     => T::TEXT(),
        ],
        ['id'],
        [],
        [
            [['id_penyerahan'], 'operasi.penyerahan_pasien', ['id_penyerahan'], 'CASCADE', 'CASCADE'],
            [['id_peralatan'], 'operasi.ref_peralatan_transfer', ['id_peralatan'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_penyerahan']]
    );
}
}

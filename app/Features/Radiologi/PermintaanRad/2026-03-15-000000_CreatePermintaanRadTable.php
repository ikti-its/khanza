<?php

namespace App\Features\Radiolgi\PermintaanRad;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreatePermintaanRadTable extends Template
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'permintaan_rad',
        [
            'id_permintaan'         => T::ID64(),
            'no_permintaan'         => T::TEXT(),
            'nomor_reg'             => T::TEXT(),
            'kode_dokter_perujuk'   => T::TEXT(),
            'tgl_jam_permintaan'    => T::DATETIME(),
            'informasi_tambahan'    => T::TEXT(),
            'indikasi_klinis'       => T::TEXT(),
            'id_status_permintaan'  => T::INT8(),
            'id_item_rad'           => T::INT32(),
        ],
        ['id_permintaan'],
        [['no_permintaan']],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_perujuk'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_status_permintaan'], 'radiologi.ref_status_permintaan_rad', ['id_status'], 'CASCADE', 'RESTRICT'],
            [['id_item_rad'], 'radiologi.ref_item_rad', ['id_item'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['tgl_jam_permintaan']]
    );
}
}

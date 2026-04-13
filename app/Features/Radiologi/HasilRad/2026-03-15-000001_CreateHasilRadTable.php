<?php

namespace App\Features\Radiolgi\HasilRad;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateHasilRadTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad',
        [
            'id_hasil_rad'        => T::ID64(),
            'id_permintaan_rad'   => T::INT64(),
            'nomor_reg'           => T::TEXT(),
            'kode_dokter_pj'      => T::TEXT(),
            'id_petugas_rad'      => T::UUID(),
            'kode_dokter_perujuk' => T::TEXT(),
            'tgl_jam_hasil'       => T::DATETIME(),
            'catatan'             => T::TEXT(),
        ],
        ['id_hasil_rad'],
        [],
        [
            [['id_permintaan_rad'], 'radiologi.permintaan_rad', ['id_permintaan'], 'CASCADE', 'RESTRICT'],
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_pj'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            // [['id_petugas_rad'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_perujuk'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['tgl_jam_hasil']]
    );
}
}

<?php

namespace App\Features\Operasi\JadwalOperasi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateJadwalOperasiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'jadwal_operasi',
        [
            'id_jadwal'          => T::ID8(),
            'id_permintaan'      => T::ID8(),
            'id_ruangan'         => T::ID8(),
            'id_tindakan'        => T::TEXT(),
            'kode_dokter_bedah'  => T::TEXT(),
            'kode_dokter_anestesi' => T::TEXT(),
            'tanggal'            => T::DATE(),
            'waktu_mulai'        => T::TIME(),
            'waktu_selesai'      => T::TIME(),
            'id_status'          => T::ID8(),
        ],
        ['id_jadwal'],
        [],
        [
            [['id_permintaan'], 'operasi.permintaan_operasi', ['id_permintaan'], 'CASCADE', 'RESTRICT'],
            [['id_ruangan'], 'operasi.ref_ruangan_operasi', ['id_ruangan'], 'CASCADE', 'RESTRICT'],
            // [['id_tindakan'], 'sik.jenis_tindakan_structure', ['kode'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_status'], 'operasi.ref_status_operasi', ['id_status'], 'CASCADE', 'RESTRICT'],
        ],
        [['tanggal'], ['kode_dokter_bedah'], ['kode_dokter_anestesi']]
    );
}
}

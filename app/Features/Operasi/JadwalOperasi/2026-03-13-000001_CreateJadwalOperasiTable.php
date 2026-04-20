<?php

namespace App\Features\Operasi\JadwalOperasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateJadwalOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'jadwal_operasi',
        [
            'id_jadwal'          => T::ID8(),
            'id_permintaan'      => T::INT8(),
            'id_ruangan'         => T::INT8(),
            'id_tindakan'        => T::TEXT(),
            'kode_dokter_bedah'  => T::TEXT(),
            'kode_dokter_anestesi' => T::TEXT(),
            'tanggal'            => T::DATE(),
            'waktu_mulai'        => T::TIME(),
            'waktu_selesai'      => T::TIME(),
            'id_status'          => T::INT8(),
        ],
        'id_jadwal',
        [],
        [
            ['id_permintaan', 'operasi.permintaan_operasi', 'id_permintaan'],
            ['id_ruangan', 'operasi.ref_ruangan_operasi', 'id_ruangan'],
            // ['id_tindakan', 'sik.jenis_tindakan_structure', 'kode'],
            // ['kode_dokter_bedah', 'sik.dokter_structure', 'kode_dokter'],
            // ['kode_dokter_anestesi', 'sik.dokter_structure', 'kode_dokter'],
            ['id_status', 'operasi.ref_status_operasi', 'id_status'],
        ],
    );
}
}

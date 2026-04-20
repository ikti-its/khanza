<?php

namespace App\Features\Operasi\SkorBromage;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateSkorBromageTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'skor_bromage',
        [
            'id_skor_bromage'    => T::ID8(),
            'nomor_reg'          => T::TEXT(),
            'waktu_penilaian'    => T::DATETIME(),
            'id_petugas'         => T::UUID(),
            'id_dokter_anestesi' => T::TEXT(),
            'skor_bromage'       => T::INT8(),
            'is_boleh_pindah'    => T::BOOL(),
            'catatan_keluar'     => T::TEXT(),
            'instruksi_rr'       => T::TEXT(),
        ],
        'id_skor_bromage',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['id_petugas', 'sik.pegawai_structure', 'id'],
            // ['id_dokter_anestesi', 'sik.dokter_structure', 'kode_dokter'],
            ['skor_bromage', 'operasi.ref_bromage', 'id_bromage'],
        ],
    );
}
}

<?php

namespace App\Features\Operasi\SkorSteward;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateSkorStewardTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'skor_steward',
        [
            'id_skor_steward'    => T::ID8(),
            'nomor_reg'          => T::TEXT(),
            'waktu_penilaian'    => T::DATETIME(),
            'id_petugas'         => T::UUID(),
            'id_dokter_anestesi' => T::TEXT(),
            'skor_kesadaran'     => T::INT8(),
            'skor_respirasi'     => T::INT8(),
            'skor_motorik'       => T::INT8(),
            'total_skor'         => T::INT8(),
            'is_boleh_pindah'    => T::BOOL(),
            'catatan_keluar'     => T::TEXT(),
            'instruksi_rr'       => T::TEXT(),
        ],
        'id_skor_steward',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['id_petugas', 'sik.pegawai_structure', 'id'],
            // ['id_dokter_anestesi', 'sik.dokter_structure', 'kode_dokter'],
            ['skor_kesadaran', 'operasi.ref_steward_kesadaran', 'id_kesadaran'],
            ['skor_respirasi', 'operasi.ref_steward_respirasi', 'id_respirasi'],
            ['skor_motorik', 'operasi.ref_steward_motorik', 'id_motorik'],
        ],
    );
}
}

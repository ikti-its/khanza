<?php

namespace App\Features\Operasi\SigninSebelumAnestesi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateSigninSebelumAnestesiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'signin_sebelum_anestesi',
        [
            'id_signin'                 => T::ID8(),
            'nomor_reg'                 => T::TEXT(),
            'waktu_signin'              => T::DATETIME(),
            'sn_cn'                     => T::TEXT(),
            'kode_dokter_bedah'         => T::TEXT(),
            'kode_dokter_anestesi'      => T::TEXT(),
            'tindakan'                  => T::TEXT(),
            'is_identitas_sesuai'       => T::BOOL(),
            'alergi'                    => T::TEXT(),
            'id_penandaan_area'         => T::INT8(),
            'is_resiko_aspirasi'        => T::BOOL(),
            'rencana_aspirasi'          => T::TEXT(),
            'is_resiko_hilang_darah'    => T::BOOL(),
            'jalur_iv_line'             => T::TEXT(),
            'rencana_hilang_darah'      => T::TEXT(),
            'id_kesiapan_anestesi'      => T::INT8(),
            'rencana_kesiapan_anestesi' => T::TEXT(),
            'id_perawat_ok'             => T::UUID(),
        ],
        'id_signin',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['kode_dokter_bedah', 'sik.dokter_structure', 'kode_dokter'],
            // ['kode_dokter_anestesi', 'sik.dokter_structure', 'kode_dokter'],
            ['id_penandaan_area', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
            ['id_kesiapan_anestesi', 'operasi.ref_kesiapan_anestesi', 'id_kesiapan'],
            // ['id_perawat_ok', 'sik.pegawai_structure', 'id'],
        ],
    );
}
}

<?php

namespace App\Features\Operasi\TimeOutSebelumInsisi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateTimeOutSebelumInsisiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'time_out_sebelum_insisi',
        [
            'id_timeout'              => T::ID8(),
            'nomor_reg'               => T::TEXT(),
            'waktu_timeout'           => T::DATETIME(),
            'sn_cn'                   => T::TEXT(),
            'kode_dokter_bedah'       => T::TEXT(),
            'kode_dokter_anestesi'    => T::TEXT(),
            'tindakan'                => T::TEXT(),
            'is_identitas_sesuai'     => T::BOOL(),
            'is_tindakan_sesuai'      => T::BOOL(),
            'is_area_insisi_sesuai'   => T::BOOL(),
            'id_penandaan_area'       => T::ID8(),
            'perkiraan_waktu_jam'     => T::F32(),
            'is_antibiotik'           => T::BOOL(),
            'nama_antibiotik'         => T::TEXT(),
            'waktu_antibiotik'        => T::TIME(),
            'antisipasi_hilang_darah' => T::TEXT(),
            'id_hal_khusus'           => T::ID8(),
            'keterangan_hal_khusus'   => T::TEXT(),
            'tanggal_steril'          => T::DATE(),
            'is_steril_dikonfirmasi'  => T::BOOL(),
            'is_verifikasi_preop'     => T::BOOL(),
            'id_perawat_ok'           => T::UUID(),
        ],
        ['id_timeout'],
        [],
        [
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_penandaan_area'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
            [['id_hal_khusus'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
            [['id_perawat_ok'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_timeout']]
    );
}
}

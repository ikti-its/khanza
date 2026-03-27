<?php

namespace App\Features\Operasi\SignoutSebelumTutupLuka;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateSignoutSebelumTutupLukaTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'signout_sebelum_tutupluka',
        [
            'id_signout'              => T::ID8(),
            'nomor_reg'               => T::TEXT(),
            'waktu_signout'           => T::DATETIME(),
            'sn_cn'                   => T::TEXT(),
            'kode_dokter_bedah'       => T::TEXT(),
            'kode_dokter_anestesi'    => T::TEXT(),
            'tindakan'                => T::TEXT(),
            'is_nama_tindakan_sesuai' => T::BOOL(),
            'is_kasa_lengkap'         => T::BOOL(),
            'is_instrumen_lengkap'    => T::BOOL(),
            'is_alat_tajam_lengkap'   => T::BOOL(),
            'id_label_spesimen'       => T::ID8(),
            'id_formulir_spesimen'    => T::ID8(),
            'is_konfirmasi_bedah'     => T::BOOL(),
            'is_konfirmasi_anestesi'  => T::BOOL(),
            'is_konfirmasi_perawat'   => T::BOOL(),
            'catatan_pemulihan'       => T::TEXT(),
            'id_perawat_ok'           => T::UUID(),
        ],
        ['id_signout'],
        [],
        [
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_label_spesimen'], 'operasi.ref_status_spesimen', ['id_status_spesimen'], 'CASCADE', 'RESTRICT'],
            [['id_formulir_spesimen'], 'operasi.ref_status_spesimen', ['id_status_spesimen'], 'CASCADE', 'RESTRICT'],
            [['id_perawat_ok'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_signout']]
    );
}
}

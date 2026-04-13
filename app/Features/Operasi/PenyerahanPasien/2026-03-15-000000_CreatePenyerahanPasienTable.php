<?php

namespace App\Features\Operasi\PenyerahanPasien;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreatePenyerahanPasienTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'penyerahan_pasien',
        [
            'id_penyerahan'          => T::ID8(),
            'nomor_reg'              => T::TEXT(),
            'waktu_masuk_asal'       => T::DATETIME(),
            'waktu_pindah'           => T::DATETIME(),
            'id_indikasi'            => T::INT8(),
            'ket_indikasi'           => T::TEXT(),
            'id_ruang_asal'          => T::INT8(),
            'id_ruang_selanjutnya'   => T::INT8(),
            'id_metode'              => T::INT8(),
            'diagnosa_utama'         => T::TEXT(),
            'diagnosa_sekunder'      => T::TEXT(),
            'prosedur_dilakukan'     => T::TEXT(),
            'obat_diberikan'         => T::TEXT(),
            'pemeriksaan_penunjang'  => T::TEXT(),
            'is_disetujui'           => T::BOOL(),
            'nama_pemberi_persetujuan' => T::TEXT(),
            'id_hubungan'            => T::INT8(),
            'asal_id_keadaan'        => T::INT8(),
            'asal_sistolik'          => T::INT8(),
            'asal_diastolik'         => T::INT8(),
            'asal_nadi'              => T::INT32(),
            'asal_respiratory_rate'  => T::INT8(),
            'asal_suhu'              => T::F32(),
            'asal_keluhan'           => T::TEXT(),
            'tiba_id_keadaan'        => T::INT8(),
            'tiba_sistolik'          => T::INT8(),
            'tiba_diastolik'         => T::INT8(),
            'tiba_nadi'              => T::INT32(),
            'tiba_respiratory_rate'  => T::INT8(),
            'tiba_suhu'              => T::F32(),
            'tiba_keluhan'           => T::TEXT(),
            'id_perawat_menyerahkan' => T::UUID(),
            'id_perawat_menerima'    => T::UUID(),
        ],
        ['id_penyerahan'],
        [],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['id_indikasi'], 'operasi.ref_indikasi_pindah', ['id_indikasi'], 'CASCADE', 'RESTRICT'],
            [['id_ruang_asal'], 'operasi.ref_ruangan_operasi', ['id_ruangan'], 'CASCADE', 'RESTRICT'],
            // [['id_ruang_selanjutnya'], 'sik.ruangan_structure', ['id'], 'CASCADE', 'RESTRICT'],
            [['id_metode'], 'operasi.ref_metode_transfer', ['id_metode'], 'CASCADE', 'RESTRICT'],
            [['id_hubungan'], 'operasi.ref_hubungan_keluarga', ['id_hubungan_keluarga'], 'CASCADE', 'RESTRICT'],
            [['asal_id_keadaan'], 'operasi.ref_keadaan_umum_transfer', ['id_keadaan_umum'], 'CASCADE', 'RESTRICT'],
            [['tiba_id_keadaan'], 'operasi.ref_keadaan_umum_transfer', ['id_keadaan_umum'], 'CASCADE', 'RESTRICT'],
            // [['id_perawat_menyerahkan'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            // [['id_perawat_menerima'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_pindah']]
    );
}
}

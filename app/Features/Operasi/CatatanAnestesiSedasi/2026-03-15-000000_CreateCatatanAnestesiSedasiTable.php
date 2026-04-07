<?php

namespace App\Features\Operasi\CatatanAnestesiSedasi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateCatatanAnestesiSedasiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'catatan_anestesi_sedasi',
        [
            'id_catatan_anestesi'  => T::ID8(),
            'nomor_reg'            => T::TEXT(),
            'waktu_catatan'        => T::DATETIME(),
            'diagnosa_pra_bedah'   => T::TEXT(),
            'tindakan'             => T::TEXT(),
            'diagnosa_paska_bedah' => T::TEXT(),
            'kode_dpjp_anestesi'   => T::TEXT(),
            'kode_dpjp_bedah'      => T::TEXT(),
            'id_perawat_anestesi'  => T::UUID(),
            'id_perawat_bedah'     => T::UUID(),
            'jam_pengkajian'       => T::TIME(),
            'id_kesadaran'         => T::INT8(),
            'sistolik'             => T::INT8(),
            'diastolik'            => T::INT8(),
            'nadi'                 => T::INT8(),
            'respiratory_rate'     => T::INT8(),
            'suhu'                 => T::F32(),
            'saturasi_o2'          => T::INT8(),
            'tinggi_badan_cm'      => T::INT8(),
            'berat_badan_kg'       => T::F32(),
            'id_golongan_darah'    => T::INT8(),
            'id_rhesus'            => T::INT8(),
            'hemoglobin'           => T::F32(),
            'hematokrit'           => T::F32(),
            'leukosit'             => T::INT32(),
            'trombosit'            => T::INT32(),
            'bleeding_time_bt'     => T::INT8(),
            'clotting_time_ct'     => T::INT8(),
            'gula_darah_sewaktu'   => T::INT32(),
            'klinis_lain_lain'     => T::TEXT(),
            'id_asa'               => T::INT8(),
            'is_alergi'            => T::BOOL(),
            'ket_alergi'           => T::TEXT(),
            'penyulit_pra'         => T::TEXT(),
            'is_lanjut_tindakan'   => T::BOOL(),
            'id_jenis_sedasi'      => T::INT8(),
            'ket_sedasi'           => T::TEXT(),
            'is_epidural'          => T::BOOL(),
            'is_spinal'            => T::BOOL(),
            'is_anestesi_umum'     => T::BOOL(),
            'ket_anestesi_umum'    => T::TEXT(),
            'is_blok_perifer'      => T::BOOL(),
            'ket_blok_perifer'     => T::TEXT(),
            'is_batal_tindakan'    => T::BOOL(),
            'alasan_batal'         => T::TEXT(),
        ],
        ['id_catatan_anestesi'],
        [],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            // [['kode_dpjp_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            // [['kode_dpjp_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            // [['id_perawat_anestesi'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            // [['id_perawat_bedah'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            [['id_golongan_darah'], 'darah.golongan_darah', ['id_golongan_darah'], 'CASCADE', 'RESTRICT'],
            [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'RESTRICT'],
            [['id_kesadaran'], 'operasi.ref_kesadaran', ['id_kesadaran'], 'CASCADE', 'RESTRICT'],
            [['id_asa'], 'operasi.ref_angka_asa', ['id_asa'], 'CASCADE', 'RESTRICT'],
            [['id_jenis_sedasi'], 'operasi.ref_jenis_sedasi', ['id_jenis_sedasi'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_catatan']]
    );
}
}

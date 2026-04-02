<?php

namespace App\Features\Operasi\ChecklistPostop;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateChecklistPostopTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop',
        [
            'id_checklist_post'    => T::ID8(),
            'nomor_reg'            => T::TEXT(),
            'waktu_checklist'      => T::DATETIME(),
            'sn_cn'                => T::TEXT(),
            'kode_dokter_bedah'    => T::TEXT(),
            'kode_dokter_anestesi' => T::TEXT(),
            'tindakan'             => T::TEXT(),
            'id_kesadaran_pascaop' => T::ID8(),
            'jenis_cairan_infus'   => T::TEXT(),
            'id_jaringan_pa_vc'    => T::ID8(),
            'id_kateter_urine'     => T::ID8(),
            'waktu_pasang_kateter' => T::TIME(),
            'id_warna_urine'       => T::ID8(),
            'jumlah_urine_cc'      => T::INT32(),
            'catatan_luka_operasi' => T::TEXT(),
            'id_petugas_anestesi'  => T::UUID(),
            'id_petugas_ok'        => T::UUID(),
        ],
        ['id_checklist_post'],
        [],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_kesadaran_pascaop'], 'operasi.ref_kesadaran_pascaop', ['id_kesadaran'], 'CASCADE', 'RESTRICT'],
            [['id_jaringan_pa_vc'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
            [['id_kateter_urine'], 'operasi.ref_ketersediaan_status', ['id_ketersediaan_status'], 'CASCADE', 'RESTRICT'],
            [['id_warna_urine'], 'operasi.ref_warna_urine', ['id_warna_urine'], 'CASCADE', 'RESTRICT'],
            // [['id_petugas_anestesi'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            // [['id_petugas_ok'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_checklist']]
    );
}
}

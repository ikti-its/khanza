<?php

namespace App\Features\Operasi\PengkajianPreInduksi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreatePengkajianPreInduksiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_pre_induksi',
        [
            'id_pengkajian'              => T::ID8(),
            'nomor_reg'                  => T::TEXT(),
            'kode_dokter'                => T::TEXT(),
            'waktu_pengkajian'           => T::DATETIME(),
            'sistolik'                   => T::INT8(),
            'diastolik'                  => T::INT8(),
            'nadi'                       => T::INT8(),
            'respiratory_rate'           => T::INT8(),
            'suhu'                       => T::F32(),
            'elektrokardiogram'          => T::TEXT(),
            'vital_lain_lain'            => T::TEXT(),
            'is_sesuai_asesmen'          => T::BOOL(),
            'perencanaan'                => T::TEXT(),
            'infus_perifer'              => T::TEXT(),
            'kateter_vena_sentral_cvc'   => T::TEXT(),
            'id_posisi'                  => T::INT8(),
            'id_premedikasi'             => T::INT8(),
            'ket_premedikasi'            => T::TEXT(),
            'id_induksi'                 => T::INT8(),
            'ket_induksi'                => T::TEXT(),
            'is_intubasi_sesudah_tidur'  => T::BOOL(),
            'is_intubasi_oral'           => T::BOOL(),
            'is_intubasi_tracheostomi'   => T::BOOL(),
            'intubasi_keterangan'        => T::TEXT(),
            'sulit_ventilasi'            => T::TEXT(),
            'sulit_intubasi'             => T::TEXT(),
            'ventilasi_keterangan'       => T::TEXT(),
            'teknik_regional_jenis'      => T::TEXT(),
            'teknik_regional_lokasi'     => T::TEXT(),
            'teknik_regional_jarum'      => T::TEXT(),
            'is_kateter'                 => T::BOOL(),
            'kateter_fiksasi_cm'         => T::INT8(),
            'obat_obatan'                => T::TEXT(),
            'komplikasi'                 => T::TEXT(),
            'hasil'                      => T::TEXT(),
        ],
        ['id_pengkajian'],
        [],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_posisi'], 'operasi.ref_posisi_pasien', ['id_posisi'], 'CASCADE', 'RESTRICT'],
            [['id_premedikasi'], 'operasi.ref_premedikasi', ['id_premedikasi'], 'CASCADE', 'RESTRICT'],
            [['id_induksi'], 'operasi.ref_induksi', ['id_induksi'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_pengkajian']]
    );
}
}

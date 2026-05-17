<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class PengkajianPreInduksiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_pre_induksi',
        [
            'id_pengkajian'              => T::ID(300_000_000),
            'nomor_reg'                  => T::FK_AUTO(),
            'kode_dokter'                => T::FK_AUTO(),
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
            'id_posisi'                  => T::FK_AUTO(),
            'id_premedikasi'             => T::FK_AUTO(),
            'ket_premedikasi'            => T::TEXT(),
            'id_induksi'                 => T::FK_AUTO(),
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
        'id_pengkajian',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            [
                ['kode_dokter'],
                \App\Features\Role\Dokter\DokterDatabase::class,
                ['id_dokter'],
            ],
            [
                ['id_posisi'],
                \App\Features\Operasi\RefPosisiPasien\RefPosisiPasienDatabase::class,
                ['id_posisi'],
            ],
            [
                ['id_premedikasi'],
                \App\Features\Operasi\RefPremedikasi\RefPremedikasiDatabase::class,
                ['id_premedikasi'],
            ],
            [
                ['id_induksi'],
                \App\Features\Operasi\RefInduksi\RefInduksiDatabase::class,
                ['id_induksi'],
            ],
        ],
    );
}
}

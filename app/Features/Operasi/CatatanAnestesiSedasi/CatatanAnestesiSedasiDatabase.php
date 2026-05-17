<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class CatatanAnestesiSedasiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'operasi',
            'catatan_anestesi_sedasi',
            [
                'id_catatan_anestesi'  => T::ID(300_000_000),
                'nomor_reg'            => T::FK_AUTO(),
                'waktu_catatan'        => T::DTIME(),
                'diagnosa_pra_bedah'   => T::TEXT(),
                'tindakan'             => T::TEXT(),
                'diagnosa_paska_bedah' => T::TEXT(),
                'kode_dpjp_anestesi'   => T::FK_AUTO(),
                'kode_dpjp_bedah'      => T::FK_AUTO(),
                'id_perawat_anestesi'  => T::FK_AUTO(),
                'id_perawat_bedah'     => T::FK_AUTO(),
                'jam_pengkajian'       => T::TIME(),
                'id_kesadaran'         => T::FK_AUTO(),
                // 'sistolik'             => T::INT8(),
                // 'diastolik'            => T::INT8(),
                // 'nadi'                 => T::INT8(),
                // 'respiratory_rate'     => T::INT8(),
                // 'suhu'                 => T::F32(),
                // 'saturasi_o2'          => T::INT8(),
                // 'tinggi_badan_cm'      => T::INT8(),
                // 'berat_badan_kg'       => T::F32(),
                'id_golongan_darah'    => T::FK_AUTO(),
                'id_rhesus'            => T::FK_AUTO(),
                // 'hemoglobin'           => T::F32(),
                // 'hematokrit'           => T::F32(),
                // 'leukosit'             => T::INT32(),
                // 'trombosit'            => T::INT32(),
                // 'bleeding_time_bt'     => T::INT8(),
                // 'clotting_time_ct'     => T::INT8(),
                // 'gula_darah_sewaktu'   => T::INT32(),
                'klinis_lain_lain'     => T::TEXT(),
                'id_asa'               => T::FK_AUTO(),
                'is_alergi'            => T::BOOL(),
                'ket_alergi'           => T::TEXT(),
                'penyulit_pra'         => T::TEXT(),
                'is_lanjut_tindakan'   => T::BOOL(),
                'id_jenis_sedasi'      => T::FK_AUTO(),
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
            'id_catatan_anestesi',
            [],
            [
                // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
                // ['kode_dpjp_anestesi', 'sik.dokter_structure', 'kode_dokter'],
                // ['kode_dpjp_bedah', 'sik.dokter_structure', 'kode_dokter'],
                // ['id_perawat_anestesi', 'sik.pegawai_structure', 'id'],
                // ['id_perawat_bedah', 'sik.pegawai_structure', 'id'],
                [
                    ['id_golongan_darah'],
                    \App\Features\Darah\GolonganDarah\GolonganDarahDatabase::class,
                    ['id_golongan_darah'],
                ],
                [
                    ['id_rhesus'],
                    \App\Features\Darah\Rhesus\RhesusDatabase::class,
                    ['id_rhesus'],
                ],
                [
                    ['id_kesadaran'],
                    \App\Features\Operasi\RefKesadaran\RefKesadaranDatabase::class,
                    ['id_kesadaran'],
                ],
                [
                    ['id_asa'],
                    \App\Features\Operasi\RefAngkaAsa\RefAngkaAsaDatabase::class,
                    ['id_asa'],
                ],
                [
                    ['id_jenis_sedasi'],
                    \App\Features\Operasi\RefJenisSedasi\RefJenisSedasiDatabase::class,
                    ['id_jenis_sedasi'],
                ],
            ],
    );
}
}

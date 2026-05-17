<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasien;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class PenyerahanPasienDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'penyerahan_pasien',
        [
            'id_penyerahan'          => T::ID(300_000_000),
            'nomor_reg'              => T::FK_AUTO(),
            'waktu_masuk_asal'       => T::DTIME(),
            'waktu_pindah'           => T::DTIME(),
            'id_indikasi'            => T::FK_AUTO(),
            'ket_indikasi'           => T::TEXT(),
            'id_ruang_asal'          => T::FK_AUTO(),
            'id_ruang_selanjutnya'   => T::FK_AUTO(),
            'id_metode'              => T::FK_AUTO(),
            'diagnosa_utama'         => T::TEXT(),
            'diagnosa_sekunder'      => T::TEXT(),
            'prosedur_dilakukan'     => T::TEXT(),
            'obat_diberikan'         => T::TEXT(),
            'pemeriksaan_penunjang'  => T::TEXT(),
            'is_disetujui'           => T::BOOL(),
            'nama_pemberi_persetujuan' => T::TEXT(),
            'id_hubungan'            => T::FK_AUTO(),
            'asal_id_keadaan'        => T::FK_AUTO(),
            'asal_sistolik'          => T::INT8(),
            'asal_diastolik'         => T::INT8(),
            'asal_nadi'              => T::INT32(),
            'asal_respiratory_rate'  => T::INT8(),
            'asal_suhu'              => T::F32(),
            'asal_keluhan'           => T::TEXT(),
            'tiba_id_keadaan'        => T::FK_AUTO(),
            'tiba_sistolik'          => T::INT8(),
            'tiba_diastolik'         => T::INT8(),
            'tiba_nadi'              => T::INT32(),
            'tiba_respiratory_rate'  => T::INT8(),
            'tiba_suhu'              => T::F32(),
            'tiba_keluhan'           => T::TEXT(),
            'id_perawat_menyerahkan' => T::FK_AUTO(),
            'id_perawat_menerima'    => T::FK_AUTO(),
        ],
        'id_penyerahan',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            [
                ['id_indikasi'],
                \App\Features\Operasi\RefIndikasiPindah\RefIndikasiPindahDatabase::class,
                ['id_indikasi'],
            ],
            [
                ['id_ruang_asal'],
                \App\Features\Operasi\RefRuanganOperasi\RefRuanganOperasiDatabase::class,
                ['id_ruangan'],
            ],
            // ['id_ruang_selanjutnya', 'sik.ruangan_structure', 'id'],
            [
                ['id_metode'],
                \App\Features\Operasi\RefMetodeTransfer\RefMetodeTransferDatabase::class,
                ['id_metode'],
            ],
            [
                ['id_hubungan'],
                \App\Features\Operasi\RefHubunganKeluarga\RefHubunganKeluargaDatabase::class,
                ['id_hubungan_keluarga'],
            ],
            [
                ['asal_id_keadaan'],
                \App\Features\Operasi\RefKeadaanUmumTransfer\RefKeadaanUmumTransferDatabase::class,
                ['id_keadaan_umum'],
            ],
            [
                ['tiba_id_keadaan'],
                \App\Features\Operasi\RefKeadaanUmumTransfer\RefKeadaanUmumTransferDatabase::class,
                ['id_keadaan_umum'],
            ],
            [
                ['id_perawat_menyerahkan'],
                \App\Features\Role\Petugas\PetugasDatabase::class,
                ['id_petugas'],
            ],
            [
                ['id_perawat_menerima'],
                \App\Features\Role\Petugas\PetugasDatabase::class,
                ['id_petugas'],
            ],
        ],
    );
}
}

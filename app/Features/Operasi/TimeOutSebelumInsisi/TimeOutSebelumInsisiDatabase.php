<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class TimeOutSebelumInsisiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'time_out_sebelum_insisi',
        [
            'id_timeout'              => T::ID32(300_000_000),
            'nomor_reg'               => T::FK_AUTO(),
            'waktu_timeout'           => T::DATETIME(),
            'sn_cn'                   => T::TEXT(),
            'kode_dokter_bedah'       => T::FK_AUTO(),
            'kode_dokter_anestesi'    => T::FK_AUTO(),
            'tindakan'                => T::TEXT(),
            'is_identitas_sesuai'     => T::BOOL(),
            'is_tindakan_sesuai'      => T::BOOL(),
            'is_area_insisi_sesuai'   => T::BOOL(),
            'id_penandaan_area'       => T::FK_AUTO(),
            'perkiraan_waktu_jam'     => T::F32(),
            'is_antibiotik'           => T::BOOL(),
            'nama_antibiotik'         => T::TEXT(),
            'waktu_antibiotik'        => T::TIME(),
            'antisipasi_hilang_darah' => T::TEXT(),
            'id_hal_khusus'           => T::FK_AUTO(),
            'keterangan_hal_khusus'   => T::TEXT(),
            'tanggal_steril'          => T::DATE(),
            'is_steril_dikonfirmasi'  => T::BOOL(),
            'is_verifikasi_preop'     => T::BOOL(),
            'id_perawat_ok'           => T::FK_AUTO(),
        ],
        'id_timeout',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            [
                ['kode_dokter_bedah'],
                \App\Features\Role\Dokter\DokterDatabase::class,
                ['id_dokter'],
            ],
            [
                ['kode_dokter_anestesi'],
                \App\Features\Role\Dokter\DokterDatabase::class,
                ['id_dokter'],
            ],
            [
                ['id_penandaan_area'],
                \App\Features\Operasi\RefKetersediaanStatus\RefKetersediaanStatusDatabase::class,
                ['id_ketersediaan_status'],
            ],
            [
                ['id_hal_khusus'],
                \App\Features\Operasi\RefKetersediaanStatus\RefKetersediaanStatusDatabase::class,
                ['id_ketersediaan_status'],
            ],
            [
                ['id_perawat_ok'],
                \App\Features\Role\Petugas\PetugasDatabase::class,
                ['id_petugas'],
            ],
        ],
    );
}
}

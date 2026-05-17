<?php
declare(strict_types=1);

namespace App\Features\Operasi\SigninSebelumAnestesi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class SigninSebelumAnestesiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'signin_sebelum_anestesi',
        [
            'id_signin'                 => T::ID32(300_000_000),
            'nomor_reg'                 => T::FK_AUTO(),
            'waktu_signin'              => T::DATETIME(),
            'sn_cn'                     => T::TEXT(),
            'kode_dokter_bedah'         => T::FK_AUTO(),
            'kode_dokter_anestesi'      => T::FK_AUTO(),
            'tindakan'                  => T::TEXT(),
            'is_identitas_sesuai'       => T::BOOL(),
            'alergi'                    => T::TEXT(),
            'id_penandaan_area'         => T::FK_AUTO(),
            'is_resiko_aspirasi'        => T::BOOL(),
            'rencana_aspirasi'          => T::TEXT(),
            'is_resiko_hilang_darah'    => T::BOOL(),
            'jalur_iv_line'             => T::TEXT(),
            'rencana_hilang_darah'      => T::TEXT(),
            'id_kesiapan_anestesi'      => T::FK_AUTO(),
            'rencana_kesiapan_anestesi' => T::TEXT(),
            'id_perawat_ok'             => T::FK_AUTO(),
        ],
        'id_signin',
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
                ['id_kesiapan_anestesi'],
                \App\Features\Operasi\RefKesiapanAnestesi\RefKesiapanAnestesiDatabase::class,
                ['id_kesiapan'],
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

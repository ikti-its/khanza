<?php
declare(strict_types=1);

namespace App\Features\RekamMedis\Registrasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RegistrasiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'rekam_medis',
            'registrasi',
            [
                'nomor_reg'   => T::ID32(100_000_000),
                'nomor_rawat' => T::TEXT(),
                'datetime'    => T::DATETIME(),
                'id_dokter'   => T::FK_AUTO(),
                'id_pasien'   => T::FK_AUTO(),
                'id_pj_pasien'=> T::FK_AUTO(),
                'hubungan_pj' => T::TEXT(),
                'poliklinik'  => T::TEXT(),
                'no_asuransi' => T::TEXT(),
            ],
            'nomor_reg',
            [],
            [
                [
                    'id_dokter',
                    \App\Features\Role\Dokter\DokterDatabase::class,
                    'id_dokter',
                ],
                [
                    'id_pasien',
                    \App\Features\Role\Pasien\PasienDatabase::class,
                    'id_pasien'
                ],
                [
                    'id_pj_pasien',
                    \App\Features\Person\Orang\OrangDatabase::class,
                    'id_orang'
                ]
            ],
            false,
            'registrasi.csv'
        );
    }
}

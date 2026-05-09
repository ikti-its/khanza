<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class HasilRadDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'radiologi',
            'hasil_rad',
            [
                'id_hasil_rad'        => T::ID32(100_000_000),
                'id_permintaan_rad'   => T::FK_AUTO(),
                'nomor_reg'           => T::FK_AUTO(),
                'kode_dokter_pj'      => T::FK_AUTO(),
                'id_petugas_rad'      => T::FK_AUTO(),
                'kode_dokter_perujuk' => T::FK_AUTO(),
                'tgl_jam_hasil'       => T::DATETIME(),
                'catatan'             => T::TEXT(),
            ],
            'id_hasil_rad',
            [],
            [
                [
                    ['id_permintaan_rad'],
                    \App\Features\Radiologi\PermintaanRad\PermintaanRadDatabase::class,
                    ['id_permintaan']
                ],
                [
                    'nomor_reg', 
                    \App\Features\RekamMedis\Registrasi\RegistrasiDatabase::class, 
                    'nomor_reg',
                ],
                [
                    'kode_dokter_pj', 
                    \App\Features\Role\Dokter\DokterDatabase::class, 
                    'id_dokter',
                ],
                [
                    'id_petugas_rad', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas',
                ],
                [
                    'kode_dokter_perujuk', 
                    \App\Features\Role\Dokter\DokterDatabase::class, 
                    'id_dokter',
                ],
            ],
        );
    }
}

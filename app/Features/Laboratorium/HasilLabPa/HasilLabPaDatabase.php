<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPa;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class HasilLabPaDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'hasil_lab_pa',
            [
                'id_hasil_pa' => T::ID32(100_000_000),
                'id_permintaan_lab' => T::FK_AUTO(),
                'nomor_reg' => T::FK_AUTO(),
                'kode_dokter_pj' => T::FK_AUTO(),
                'id_petugas_lab' => T::FK_AUTO(),
                'kode_dokter_perujuk' => T::FK_AUTO(),
                'tgl_jam_hasil' => T::DATETIME(),
                'id_item_pemeriksaan' => T::FK_AUTO(),
                'diagnosa_klinis' => T::TEXT(),
                'makroskopik' => T::TEXT(),
                'mikroskopik' => T::TEXT(),
                'kesimpulan' => T::TEXT(),
                'kesan' => T::TEXT()->nullable(),
            ],
            'id_hasil_pa',
            [],
            [
                [
                    ['id_permintaan_lab'],
                    \App\Features\Laboratorium\PermintaanLabHeader\PermintaanLabHeaderDatabase::class,
                    ['id_permintaan'],
                ],
                // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
                [
                    'kode_dokter_pj', 
                    \App\Features\Role\Dokter\DokterDatabase::class, 
                    'id_dokter',
                ],
                [
                    'id_petugas_lab', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas',
                ],
                [
                    'kode_dokter_perujuk', 
                    \App\Features\Role\Dokter\DokterDatabase::class, 
                    'id_dokter',
                ],
                [
                    ['id_item_pemeriksaan'],
                    \App\Features\Laboratorium\PermintaanLabPa\PermintaanLabPaDatabase::class,
                    ['id_permintaan_pa'],
                ],
            ],
            false,
            'hasil_lab_pa.csv'
        );
    }
}

<?php

namespace App\Features\Laboratorium\PermintaanLabHeader;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PermintaanLabHeaderDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'permintaan_lab_header',
            [
                'id_permintaan' => T::ID64(100_000),
                'no_permintaan' => T::TEXT(),
                'nomor_reg' => T::TEXT(),
                'id_kategori_lab' => T::FK_AUTO(),
                'kode_dokter_perujuk' => T::TEXT(),
                'tgl_permintaan' => T::DATETIME(),
                'indikasi_klinis' => T::TEXT(),
                'informasi_tambahan' => T::TEXT(),
                'id_status_permintaan' => T::FK_AUTO(),
            ],
            'id_permintaan',
            [],
            [
                // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
                [
                    ['id_kategori_lab'],
                    \App\Features\Laboratorium\RefKategoriLab\RefKategoriLabDatabase::class,
                    ['id_kategori'],
                ],
                // ['kode_dokter_perujuk', 'sik.dokter_structure', 'kode_dokter'],
                [
                    ['id_status_permintaan'],
                    \App\Features\Laboratorium\RefStatusPermintaan\RefStatusPermintaanDatabase::class,
                    ['id_status'],
                ],
            ],
            false,
            'permintaan_lab_header.csv'
        );
    }
}

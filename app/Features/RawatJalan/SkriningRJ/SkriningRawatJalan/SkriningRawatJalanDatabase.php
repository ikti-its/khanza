<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class SkriningRawatJalanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'skrining_rj',
            'skrining_rawat_jalan',
            [
                'id_skrining' => T::ID64(100_000),
                'no_rm' => T::FK_AUTO(),
                'tgl_jam_skrining' => T::DATETIME(),
                'id_kesadaran' => T::FK_AUTO(),
                'id_pernafasan' => T::FK_AUTO(),
                'id_skala_nyeri' => T::FK_AUTO(),
                'id_nyeri_dada' => T::FK_AUTO(),
                'id_batuk' => T::FK_AUTO(),
                'is_geriatri' => T::BOOL(),
                'is_risiko_jatuh' => T::BOOL(),
                'id_keputusan' => T::FK_AUTO(),
                'id_petugas' => T::FK_AUTO(),
            ],
            'id_skrining',
            [],
            [
                // ['no_rm', 'sik.pasien_structure', 'no_rkm_medis'],
                [
                    ['id_kesadaran'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran\RefSkriningKesadaranDatabase::class,
                    ['id_kesadaran'],
                ],
                [
                    ['id_pernafasan'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan\RefSkriningPernafasanDatabase::class,
                    ['id_pernafasan'],
                ],
                [
                    ['id_skala_nyeri'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri\RefSkriningSkalaNyeriDatabase::class,
                    ['id_skala_nyeri'],
                ],
                [
                    ['id_nyeri_dada'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningNyeriDada\RefSkriningNyeriDadaDatabase::class,
                    ['id_nyeri_dada'],
                ],
                [
                    ['id_batuk'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningBatuk\RefSkriningBatukDatabase::class,
                    ['id_batuk'],
                ],
                [
                    ['id_keputusan'],
                    \App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan\RefSkriningKeputusanDatabase::class,
                    ['id_keputusan'],
                ],
                // ['id_petugas', 'sik.pegawai_structure', 'id'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PermintaanDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'permintaan_darah',
            [
                'id_permintaan'           => T::ID32(30_000_000),
                'no_rawat'                => T::TEXT(),
                'id_dokter_pengirim'      => T::FK_AUTO(),
                'tanggal_permintaan'      => T::DATETIME(),
                'id_status_permintaan'    => T::FK_AUTO(),
            ],
            'id_permintaan',
            ['no_rawat'],
            [
                // ['no_rawat', 'sik.rawat_inap', 'no_rawat'],
                [
                    'id_dokter_pengirim', 
                    \App\Features\Role\Dokter\DokterDatabase::class, 
                    'id_dokter'
                ],
                [
                    'id_status_permintaan', 
                    \App\Features\DistribusiDarah\StatusPermintaan\StatusPermintaanDatabase::class, 
                    'id_status_permintaan'
                ],
            ],
            false,
            'permintaan_darah.csv'
        );
    }
}

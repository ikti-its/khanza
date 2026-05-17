<?php

namespace App\Features\Pendidikan\Sekolah;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class SekolahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'sekolah',
            [
                'id_sekolah'   => T::ID(80_000),
                'nama_sekolah' => T::TEXT(),
                'jenis_id'     => T::FK_AUTO(),
                'alamat_id'    => T::FK_AUTO(),
            ],
            'id_sekolah',
            [],
            [
                [
                    'alamat_id',
                    \App\Features\Lokasi\Alamat\AlamatDatabase::class,
                    'id_alamat',
                ],
                [
                    'jenis_id',
                    \App\Features\Pendidikan\JenisPendidikan\JenisPendidikanDatabase::class,
                    'id_jenis_pendidikan',
                ],
            ],
        );
    }
}

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
                'id_jenis'     => T::FK_AUTO(),
                'id_alamat'    => T::FK_AUTO(),
            ],
            'id_sekolah',
            [],
            [
                [
                    'id_alamat',
                    \App\Features\Lokasi\Alamat\AlamatDatabase::class,
                    'id_alamat',
                ],
                [
                    'id_jenis',
                    \App\Features\Pendidikan\JenisPendidikan\JenisPendidikanDatabase::class,
                    'id_jenis',
                ],
            ],
        );
    }
}

<?php

namespace App\Features\Pendidikan\Sekolah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class SekolahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'sekolah',
            [
                'id_sekolah'   => T::ID32(80_000),
                'nama_sekolah' => T::TEXT(),
                'jenis_id'     => T::INT8(),
                'alamat_id'    => T::INT32(),
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

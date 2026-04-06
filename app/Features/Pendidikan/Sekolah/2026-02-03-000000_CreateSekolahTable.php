<?php

namespace App\Features\Pendidikan\Sekolah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateSekolahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'sekolah',
            [
                'id_sekolah'   => T::ID8(),
                'nama_sekolah' => T::TEXT(),
                'jenis_id'     => T::ID8(),
                'alamat_id'    => T::ID32(),
            ],
            ['id_sekolah'],
            [],
            [
                [['alamat_id'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'CASCADE'],
                [['jenis_id'], 'jenis_pendidikan', ['id_jenis_pendidikan'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

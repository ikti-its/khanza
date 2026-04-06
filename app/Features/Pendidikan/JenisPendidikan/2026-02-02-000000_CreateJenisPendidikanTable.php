<?php

namespace App\Features\Pendidikan\JenisPendidikan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateJenisPendidikanTable extends Template
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'jenis_pendidikan',
            [
                'id_jenis_pendidikan'   => T::ID8(),
                'nama_jenis_pendidikan' => T::TEXT(),
                'jenjang_pendidikan_id' => T::ID8(),
                
            ],
            ['id_jenis_pendidikan'],
            [['nama_jenis_pendidikan']],
            [
                [['jenjang_pendidikan_id'], 'jenjang_pendidikan', ['id_jenjang_pendidikan'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

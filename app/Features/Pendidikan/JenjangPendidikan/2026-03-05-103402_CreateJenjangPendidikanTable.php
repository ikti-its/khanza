<?php

namespace App\Features\Pendidikan\JenjangPendidikan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateJenjangPendidikanTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'jenjang_pendidikan',
            [
                'id_jenjang_pendidikan'   => T::ID8(),
                'nama_jenjang_pendidikan' => T::TEXT(),
            ],
            ['id_jenjang_pendidikan'],
            [['nama_jenjang_pendidikan']],
            [],
            [],
        );
    }
}

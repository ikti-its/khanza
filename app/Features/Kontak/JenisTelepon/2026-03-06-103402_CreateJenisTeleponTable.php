<?php

namespace App\Features\Kontak\JenisTelepon;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateJenisTeleponTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'jenis_telepon',
            [
                'id_jenis_telepon'   => T::ID8(),
                'nama_jenis_telepon' => T::TEXT(),
            ],
            ['id_jenis_telepon'],
            [['nama_jenis_telepon']],
            [],
            [],
        );
    }
}

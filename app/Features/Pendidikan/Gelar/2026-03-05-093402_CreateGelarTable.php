<?php

namespace App\Features\Pendidikan\Gelar;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
* Tabel orang digunakan untuk menyimpan data identitas individu
* yang terdaftar di dalam sistem.
*
* Data ini bersifat master dan dapat direlasikan dengan berbagai
* fitur lain seperti donor, pasien, petugas, atau pengguna sistem.
 */

class CreateGelarTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'gelar',
            [
                'id_gelar'   => T::ID8(),
                'nama_gelar' => T::TEXT(),
            ],
            ['id_gelar'],
            [['nama_gelar']],
            [],
            [],
        );
    }
}

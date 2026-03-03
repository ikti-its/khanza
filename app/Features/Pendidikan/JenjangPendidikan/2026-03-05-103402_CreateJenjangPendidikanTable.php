<?php

namespace App\Features\Pendidikan\JenjangPendidikan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
* Tabel orang digunakan untuk menyimpan data identitas individu
* yang terdaftar di dalam sistem.
*
* Data ini bersifat master dan dapat direlasikan dengan berbagai
* fitur lain seperti donor, pasien, petugas, atau pengguna sistem.
 */

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

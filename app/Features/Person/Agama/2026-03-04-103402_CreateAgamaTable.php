<?php

namespace App\Features\Person\Agama;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
* Tabel orang digunakan untuk menyimpan data identitas individu
* yang terdaftar di dalam sistem.
*
* Data ini bersifat master dan dapat direlasikan dengan berbagai
* fitur lain seperti donor, pasien, petugas, atau pengguna sistem.
 */

class CreateAgamaTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'agama',
            [
                'id_agama'   => T::ID8(),
                'nama_agama' => T::TEXT(),
            ],
            ['id_agama'],
            [['nama_agama']],
            [],
            [],
        );
    }
}

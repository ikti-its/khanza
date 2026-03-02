<?php

namespace App\Features\AturanPenggajian\Jabatan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateJabatanTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'jabatan',
            [
                'no_jabatan'    => T::ID8(),
                'jenis_jabatan' => T::TEXT(),
                'nama_jabatan'  => T::TEXT(),
                'jenjang'       => T::TEXT(),
                'tunjangan'     => T::INT32(),
            ],
            ['no_jabatan'],
            [['nama_jabatan']],
            [],
            [],
        );
    }
}

<?php

namespace App\Features\AturanPenggajian\Golongan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateGolonganTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'golongan',
            [
                'no_golongan'   => T::ID8(),
                'kode_golongan' => T::TEXT(),
                'nama_golongan' => T::TEXT(),
                'pendidikan'    => T::TEXT(),
                'gaji_pokok'    => T::INT32(),
            ],
            ['no_golongan'],
            [['nama_golongan'], ['kode_golongan']],
            [],
            []
        );
    }
}

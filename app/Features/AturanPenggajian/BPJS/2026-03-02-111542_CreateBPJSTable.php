<?php

namespace App\Features\AturanPenggajian\BPJS;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateBPJSTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'bpjs',
            [
                'no_bpjs'       => T::ID8(),
                'nama_program'  => T::TEXT(),
                'penyelenggara' => T::TEXT(),
                'tarif'         => T::F32(),
                'batas_atas'    => T::INT32(),
                'batas_bawah'   => T::INT32(),
            ],
            ['no_bpjs'],
            [['nama_program']],
            [],
            [],
        );
    }
}

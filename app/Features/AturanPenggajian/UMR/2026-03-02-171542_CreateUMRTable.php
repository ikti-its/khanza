<?php

namespace App\Features\AturanPenggajian\UMR;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateUMRTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'umr',
            [
                'no_umr'        => T::ID8(),
                'provinsi'      => T::ID8(),
                'kotakab'       => T::ID8(),
                'jenis'         => T::TEXT(),
                'upah_minimum'  => T::INT32(),
            ],
            ['no_umr'],
        );
    }
}

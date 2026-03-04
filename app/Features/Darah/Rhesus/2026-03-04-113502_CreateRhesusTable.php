<?php

namespace App\Features\Darah\Rhesus;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateRhesusTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'rhesus',
            [
                'id_rhesus'      => T::ID8(),
                'kode_rhesus'    => T::TEXT(),
            ],
            ['id_rhesus'],
            [['kode_rhesus']],
        );
    }
}

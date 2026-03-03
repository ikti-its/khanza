<?php

namespace App\Features\Lokasi\Negara;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateNegaraTable extends MigrationTemplate
{   
    public function __construct(){
        parent::__construct(
            'lokasi',
            'negara',
            [
                'id_negara'    => T::ID8(),
                'nama_negara'  => T::TEXT(),
                'kode_telepon' => T::INT16(),
            ],
            ['id_negara'],
            [['nama_negara']],
        );
    }
}

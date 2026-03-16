<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Negara;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateNegaraTable extends DatabaseTemplate
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

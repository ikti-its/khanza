<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateTriaseMacamKasusTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_macam_kasus',
            [
                'id_macam_kasus'          => T::ID8(),
                'kode_macam_kasus'        => T::TEXT(),
                'nama_macam_kasus'        => T::TEXT(),
            ],
            ['id_macam_kasus'],
            [['kode_macam_kasus'], ['nama_macam_kasus']],
            [],
            [],
            true,
            __DIR__ . '/triase_macam_kasus.csv'
        );
    }
}

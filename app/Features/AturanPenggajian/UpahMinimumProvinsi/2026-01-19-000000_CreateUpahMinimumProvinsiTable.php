<?php

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateUpahMinimumProvinsiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_provinsi',
            [
                'no_ump'       => T::ID8(),
                'tahun'        => T::YEAR(),
                'provinsi'     => T::ID8(),
                'upah_minimum' => T::INT32(),
            ],
            ['no_ump'],
            [],
            [
                [['provinsi'], 'lokasi.provinsi', ['id_provinsi'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

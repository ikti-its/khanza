<?php

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\DatabaseTemplate;
use App\Core\DBType as T;

class CreateUpahMinimumKotakabTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_kotakab',
            [
                'no_ump'       => T::ID8(),
                'tahun'        => T::YEAR(),
                'provinsi'     => T::ID8(),
                'kotakab'      => T::ID8(),
                'upah_minimum' => T::INT32(),
            ],
            ['no_ump'],
            [],
            [
                [['provinsi', 'kotakab'], 'lokasi.kota', ['id_provinsi', 'id_kota_lokal'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

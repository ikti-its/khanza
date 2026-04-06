<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateUpahMinimumProvinsiTable extends Template
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

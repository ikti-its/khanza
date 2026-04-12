<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateCaraMasukTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'cara_masuk',
            [
                'id_cara'          => T::ID8(),
                'nama_cara'        => T::TEXT(),
            ],
            ['id_cara'],
            [['nama_cara']],
            [],
            [],
            true,
            __DIR__ . '/cara_masuk.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateCaraMasukTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'cara_masuk',
            [
                'id_cara'          => T::ID8(),
                'nama_cara'        => T::TEXT(),
            ],
            'id_cara',
            'nama_cara',
            [],
            true,
            __DIR__ . '/cara_masuk.csv'
        );
    }
}

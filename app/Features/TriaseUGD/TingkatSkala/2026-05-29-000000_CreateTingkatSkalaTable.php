<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateTingkatSkalaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'tingkat_skala',
            [
                'id_tingkat'          => T::ID8(),
                'nama_tingkat'        => T::TEXT(),
            ],
            ['id_tingkat'],
            [['nama_tingkat']],
            [],
            true,
            __DIR__ . '/tingkat_skala.csv'
        );
    }
}

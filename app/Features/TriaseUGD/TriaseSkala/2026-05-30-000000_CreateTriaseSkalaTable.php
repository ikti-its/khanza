<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateTriaseSkalaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_skala',
            [
                'id_skala'              => T::ID16(),
                'tingkat_skala'         => T::INT8(),
                'kode_skala'            => T::TEXT(),
                'id_pemeriksaan'        => T::INT8(),
                'pengkajian'            => T::TEXT(),
            ],
            ['id_skala'],
            [['tingkat_skala', 'kode_skala'], ['tingkat_skala', 'id_pemeriksaan', 'pengkajian']],
            [
                [['id_pemeriksaan'], 'triase_pemeriksaan', ['id_pemeriksaan'], 'CASCADE', 'CASCADE'],
            ],
            [],
            true,
            __DIR__ . '/triase_skala.csv'
        );
    }
}

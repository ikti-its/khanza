<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateTriasePemeriksaanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_pemeriksaan',
            [
                'id_pemeriksaan'          => T::ID8(),
                'kode_pemeriksaan'        => T::TEXT(),
                'nama_pemeriksaan'        => T::TEXT(),
            ],
            ['id_pemeriksaan'],
            [['kode_pemeriksaan'], ['nama_pemeriksaan']],
            [],
            true,
            __DIR__ . '/triase_pemeriksaan.csv'
        );
    }
}

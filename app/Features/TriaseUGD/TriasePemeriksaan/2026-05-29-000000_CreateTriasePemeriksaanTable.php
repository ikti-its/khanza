<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateTriasePemeriksaanTable extends Template
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
            [],
            true,
            __DIR__ . '/triase_pemeriksaan.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateUpahMinimumKotakabTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_kotakab',
            [
                'no_ump'       => T::ID8(),
                'tahun'        => T::YEAR(),
                // 'provinsi'     => T::ID8(),
                'kotakab'      => T::INT16(),
                'upah_minimum' => T::INT32(),
            ],
            'no_ump',
            [],
            // [['provinsi', 'kotakab'], 'lokasi.kota', ['id_provinsi', 'id_kota_lokal'], 'CASCADE', 'CASCADE'],
            [['kotakab'], 'lokasi.kota', ['id_kota_lokal']],
        );
    }
}

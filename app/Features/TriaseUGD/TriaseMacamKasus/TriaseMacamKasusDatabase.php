<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class TriaseMacamKasusDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_macam_kasus',
            [
                'id_macam_kasus'          => T::ID8(20),
                'kode_macam_kasus'        => T::TEXT(),
                'nama_macam_kasus'        => T::TEXT(),
            ],
            'id_macam_kasus',
            ['kode_macam_kasus', 'nama_macam_kasus'],
            [],
            true,
            'triase_macam_kasus.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateJenisPencekalanTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'jenis_pencekalan',
            [
                'id_jenis_pencekalan'      => T::ID8(),
                'nama_jenis_pencekalan'    => T::TEXT(),
            ],
            ['id_jenis_pencekalan'],
            [['nama_jenis_pencekalan']],
            [],
            [],
            true,
            __DIR__ . '/jenis_pencekalan.csv'
        );
    }
}

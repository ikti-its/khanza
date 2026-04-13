<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateStatusPencekalanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'status_pencekalan',
            [
                'id_status_pencekalan'      => T::ID8(),
                'nama_status_pencekalan'    => T::TEXT(),
            ],
            ['id_status_pencekalan'],
            [['nama_status_pencekalan']],
            [],
            [],
            true,
            __DIR__ . '/status_pencekalan.csv'
        );
    }
}

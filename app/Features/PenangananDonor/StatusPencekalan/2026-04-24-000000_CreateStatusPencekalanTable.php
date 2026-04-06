<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStatusPencekalanTable extends Template
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

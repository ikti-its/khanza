<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateStatusKasusTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'status_kasus',
            [
                'id_status_kasus'       => T::ID8(),
                'nama_status_kasus'     => T::TEXT(),
            ],
            ['id_status_kasus'],
            [['nama_status_kasus']],
            [],
            true,
            __DIR__ . '/status_kasus.csv'
        );
    }
}

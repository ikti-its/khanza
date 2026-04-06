<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStatusKasusTable extends Template
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
            [],
            true,
            __DIR__ . '/status_kasus.csv'
        );
    }
}

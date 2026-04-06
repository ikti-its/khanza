<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStatusPendonorTable extends Template
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_pendonor',
            [
                'id_status_pendonor'      => T::ID8(),
                'nama_status_pendonor'    => T::TEXT(),
            ],
            ['id_status_pendonor'],
            [['nama_status_pendonor']],
            [],
            [],
            true,
            __DIR__ . '/status_pendonor.csv'
        );
    }
}

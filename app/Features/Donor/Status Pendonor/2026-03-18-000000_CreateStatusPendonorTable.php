<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateStatusPendonorTable extends DatabaseTemplate
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
        );
    }
}

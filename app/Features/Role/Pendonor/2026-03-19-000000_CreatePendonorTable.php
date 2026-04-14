<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePendonorTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'role',
            'pendonor',
            [
                'id_pendonor'                => T::ID32(),
                'id_orang'                   => T::INT32(),
                'nomor_pendonor'             => T::TEXT(),
                'id_rhesus'                  => T::INT8(),
                'id_status_pendonor'         => T::INT8(),
            ],
            ['id_pendonor'],
            [['id_orang'], ['nomor_pendonor']],
            [
                [['id_orang'], 'person.orang', ['id_orang'], 'CASCADE', 'CASCADE'],
                [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'CASCADE'],
                [['id_status_pendonor'], 'donor.status_pendonor', ['id_status_pendonor'], 'CASCADE', 'CASCADE'],
            ],
            [['id_status_pendonor']],
            false,
            __DIR__ . '/pendonor.csv'
        );
    }
}

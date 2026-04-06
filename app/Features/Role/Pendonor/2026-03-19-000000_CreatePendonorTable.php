<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePendonorTable extends Template
{
    public function __construct(){
        parent::__construct(
            'role',
            'pendonor',
            [
                'id_pendonor'                => T::ID32(),
                'id_orang'                   => T::ID32(),
                'nomor_kartu_pendonor'       => T::TEXT(),
                'id_rhesus'                  => T::ID8(),
                'id_status_pendonor'         => T::ID8(),
            ],
            ['id_pendonor'],
            [['id_orang'], ['nomor_kartu_pendonor']],
            [
                [['id_orang'], 'person.orang', ['id_orang'], 'CASCADE', 'CASCADE'],
                [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'CASCADE'],
                [['id_status_pendonor'], 'donor.status_pendonor', ['id_status_pendonor'], 'CASCADE', 'CASCADE'],
            ],
            [['id_status_pendonor']],
        );
    }
}

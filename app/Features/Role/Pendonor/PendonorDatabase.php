<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PendonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'role',
            'pendonor',
            [
                'id_pendonor'        => T::ID32(300_000_000),
                'id_orang'           => T::FK_AUTO(),
                'nomor_pendonor'     => T::TEXT(),
                'id_rhesus'          => T::FK_AUTO(),
                'id_status_pendonor' => T::FK_AUTO(),
            ],
            'id_pendonor',
            [
                'id_orang', 
                'nomor_pendonor'
            ],
            [
                [
                    'id_orang', 
                    \App\Features\Person\Orang\OrangDatabase::class, 
                    'id_orang'
                ],
                [
                    'id_rhesus', 
                    \App\Features\Darah\Rhesus\RhesusDatabase::class, 
                    'id_rhesus'
                ],
                [
                    'id_status_pendonor', 
                    \App\Features\Donor\StatusPendonor\StatusPendonorDatabase::class, 
                    'id_status_pendonor'
                ],
            ],
            false,
            'pendonor.csv'
        );
    }
}

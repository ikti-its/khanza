<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKunjunganTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'kunjungan',
            [
                'id_kunjungan'          => T::ID32(),
                'id_pendonor'           => T::ID32(),
                'tanggal_kunjungan'     => T::DATE(),
                'nomor_antrian'         => T::INT16(),
                'id_status_kunjungan'   => T::ID8(),
            ],
            ['id_kunjungan'],
            [['tanggal_kunjungan', 'nomor_antrian']],
            [
                [['id_pendonor'], 'role.pendonor', ['id_pendonor'], 'CASCADE', 'CASCADE'],
                [['id_status_kunjungan'], 'status_kunjungan', ['id_status_kunjungan'], 'CASCADE', 'CASCADE'],
            ],
            [['id_pendonor']],
        );
    }
}

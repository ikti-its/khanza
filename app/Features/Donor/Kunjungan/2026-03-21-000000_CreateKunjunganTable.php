<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKunjunganTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'kunjungan',
            [
                'id_kunjungan'          => T::ID32(),
                'id_pendonor'           => T::INT32(),
                'tanggal_kunjungan'     => T::DATE(),
                'nomor_antrian'         => T::INT16(),
                'id_status_kunjungan'   => T::INT8(),
            ],
            ['id_kunjungan'],
            [['tanggal_kunjungan', 'nomor_antrian']],
            [
                [['id_pendonor'], 'role.pendonor', ['id_pendonor'], 'CASCADE', 'CASCADE'],
                [['id_status_kunjungan'], 'status_kunjungan', ['id_status_kunjungan'], 'CASCADE', 'CASCADE'],
            ],
            false,
            __DIR__ . '/kunjungan.csv'
        );
    }
}

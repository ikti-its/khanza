<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class KunjunganDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'kunjungan',
            [
                'id_kunjungan'          => T::ID32(100_000_000),
                'id_pendonor'           => T::FK_AUTO(),
                'tanggal_kunjungan'     => T::DATE(),
                'nomor_antrian'         => T::TEXT(),
                'id_status_kunjungan'   => T::FK_AUTO(),
            ],
            'id_kunjungan',
            [['tanggal_kunjungan', 'nomor_antrian']],
            [
                [
                    'id_pendonor', 
                    \App\Features\Role\Pendonor\PendonorDatabase::class, 
                    'id_pendonor'
                ],
                [
                    'id_status_kunjungan', 
                    \App\Features\Donor\StatusKunjungan\StatusKunjunganDatabase::class, 
                    'id_status_kunjungan'
                ],
            ],
            false,
            'kunjungan.csv'
        );
    }
}

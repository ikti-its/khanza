<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePencekalanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'pencekalan',
            [
                'id_pencekalan'             => T::ID32(),
                'id_kunjungan'              => T::INT32(),
                'id_jenis_pencekalan'       => T::INT8(),
                'tanggal_mulai'             => T::DATE(),
                'tanggal_selesai'           => T::DATE()->nullable(),
                'id_shift'                  => T::INT8(),
                'id_petugas'                => T::UUID(),
                'keterangan'                => T::TEXT(),
                'id_status_pencekalan'      => T::INT8(),
            ],
            'id_pencekalan',
            'id_kunjungan',
            [
                ['id_kunjungan', 'donor.kunjungan', 'id_kunjungan'],
                ['id_jenis_pencekalan', 'jenis_pencekalan', 'id_jenis_pencekalan'],
                ['id_shift', 'operasional.shift', 'id_shift'],
                // ['id_petugas', 'role.petugas', 'id_petugas'],
                ['id_status_pencekalan', 'status_pencekalan', 'id_status_pencekalan'],
            ],
            false,
            __DIR__ . '/pencekalan.csv'
        );
    }
}

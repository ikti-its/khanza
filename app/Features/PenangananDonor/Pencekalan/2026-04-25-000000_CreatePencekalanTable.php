<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePencekalanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'pencekalan',
            [
                'id_pencekalan'             => T::ID32(),
                'id_kunjungan'              => T::ID32(),
                'id_jenis_pencekalan'       => T::ID8(),
                'tanggal_mulai'             => T::DATE(),
                'tanggal_selesai'           => T::DATE()->nullable(),
                'id_shift'                  => T::ID8(),
                'id_petugas'                => T::ID32(),
                'keterangan'                => T::TEXT(),
                'id_status_pencekalan'      => T::ID8(),
            ],
            ['id_pencekalan'],
            [['id_kunjungan']],
            [
                [['id_kunjungan'], 'donor.kunjungan', ['id_kunjungan'], 'CASCADE', 'CASCADE'],
                [['id_jenis_pencekalan'], 'jenis_pencekalan', ['id_jenis_pencekalan'], 'CASCADE', 'CASCADE'],
                [['id_shift'], 'operasional.shift', ['id_shift'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
                [['id_status_pencekalan'], 'status_pencekalan', ['id_status_pencekalan'], 'CASCADE', 'CASCADE'],
            ],
            [['id_jenis_pencekalan'], ['id_status_pencekalan']],
        );
    }
}

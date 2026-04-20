<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKasusReaktifTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'kasus_reaktif',
            [
                'id_kasus'               => T::ID32(),
                'id_kunjungan'           => T::INT32(),
                'tanggal_ditetapkan'     => T::DATE(),
                'id_status_kasus'        => T::INT8(),
            ],
            ['id_kasus'],
            [['id_kunjungan']],
            [
                [['id_kunjungan'], 'donor.kunjungan', ['id_kunjungan'], 'CASCADE', 'CASCADE'],
                [['id_status_kasus'], 'status_kasus', ['id_status_kasus'], 'CASCADE', 'CASCADE'],
            ],
            [['id_status_kasus']],
        );
    }
}

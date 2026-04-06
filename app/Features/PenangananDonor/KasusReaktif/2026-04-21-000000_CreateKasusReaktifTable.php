<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateKasusReaktifTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'kasus_reaktif',
            [
                'id_kasus'               => T::ID32(),
                'id_status_kasus'        => T::ID8(),
                'tanggal_ditetapkan'     => T::DATE(),
            ],
            ['id_kasus'],
            [],
            [
                [['id_status_kasus'], 'status_kasus', ['id_status_kasus'], 'CASCADE', 'CASCADE'],
            ],
            [['id_status_kasus']],
        );
    }
}

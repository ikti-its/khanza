<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKasusReaktifTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'kasus_reaktif',
            [
                'id_kasus'              => T::ID32(),
                'id_kantong'            => T::ID32(),
                'id_status_kasus'       => T::ID8(),
            ],
            ['id_kasus'],
            [['id_kantong']],
            [
                [['id_kantong'], 'inventori.kantong_darah_utama', ['id_kantong'], 'CASCADE', 'CASCADE'],
                [['id_status_kasus'], 'status_kasus', ['id_status_kasus'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

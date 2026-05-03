<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class JenisPencekalanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'jenis_pencekalan',
            [
                'id_jenis_pencekalan'      => T::ID8(2),
                'nama_jenis_pencekalan'    => T::TEXT(),
            ],
            'id_jenis_pencekalan',
            ['nama_jenis_pencekalan'],
            [],
            true,
            'jenis_pencekalan.csv'
        );
    }
}

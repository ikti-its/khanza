<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisPencekalanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'penanganan_donor',
            'jenis_pencekalan',
            [
                'id_jenis_pencekalan'   => T::ID(3),
                'nama_jenis_pencekalan' => T::NAME(20),
            ],
            'id_jenis_pencekalan',
            ['nama_jenis_pencekalan'],
            [],
            true,
            'jenis_pencekalan.csv',
        );
    }
}

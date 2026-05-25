<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class AlasanPemusnahanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'pemusnahan_darah',
            'alasan_pemusnahan',
            [
                'id_alasan'   => T::ID(5),
                'nama_alasan' => T::NAME(20),
            ],
            'id_alasan',
            ['nama_alasan'],
            [],
            true,
            'alasan_pemusnahan.csv',
        );
    }
}

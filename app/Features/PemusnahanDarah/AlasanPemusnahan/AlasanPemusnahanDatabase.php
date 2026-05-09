<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class AlasanPemusnahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan_darah',
            'alasan_pemusnahan',
            [
                'id_alasan'   => T::ID8(10),
                'nama_alasan' => T::TEXT(),
            ],
            'id_alasan',
            ['nama_alasan'],
            [],
            true,
            'alasan_pemusnahan.csv'
        );
    }
}

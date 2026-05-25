<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefStewardRespirasiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_steward_respirasi',
            [
                'id_respirasi' => T::ID(5),
                'nama_skala'   => T::TEXT(),
                'nilai'        => T::SCORE(),
            ],
            'id_respirasi',
            [],
            [],
            true,
            'steward_respirasi.csv',
        );
    }
}

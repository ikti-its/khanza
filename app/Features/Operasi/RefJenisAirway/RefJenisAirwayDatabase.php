<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisAirway;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefJenisAirwayDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_jenis_airway',
            [
                'id_jenis'   => T::ID(10),
                'nama_jenis' => T::TEXT(),
            ],
            'id_jenis',
            [],
            [],
            true,
            'jenis_airway.csv',
        );
    }
}

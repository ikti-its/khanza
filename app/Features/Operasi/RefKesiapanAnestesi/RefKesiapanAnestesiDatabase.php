<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefKesiapanAnestesiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_kesiapan_anestesi',
            [
                'id_kesiapan'   => T::ID(5),
                'nama_kesiapan' => T::TEXT(),
            ],
            'id_kesiapan',
            [],
            [],
            true,
            'kesiapan_anestesi.csv',
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class UnitDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'unit',
            [
                'id_unit'   => T::ID(20),
                'nama_unit' => T::NAME(100),
            ],
            'id_unit',
            ['nama_unit'],
            [],
            true,
            'unit.csv',
        );
    }
}

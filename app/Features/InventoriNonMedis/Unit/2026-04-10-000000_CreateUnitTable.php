<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateUnitTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'unit',
            [
                'id_unit'   => T::ID32(),
                'nama_unit' => T::TEXT(),
            ],
            'id_unit',
            'nama_unit',
            [],
            true,
            __DIR__ . '/unit.csv'
        );
    }
}

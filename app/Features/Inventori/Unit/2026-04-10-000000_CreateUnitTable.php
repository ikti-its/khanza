<?php
declare(strict_types=1);

namespace App\Features\Inventori\Unit;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateUnitTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'unit',
            [
                'id_unit'   => T::ID32(),
                'nama_unit' => T::TEXT(),
            ],
            ['id_unit'],
            [
                ['nama_unit']
            ],
            [],
            [],
            true,
            __DIR__ . '/unit.csv'
        );
    }
}

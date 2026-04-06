<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateUnitTable extends Template
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

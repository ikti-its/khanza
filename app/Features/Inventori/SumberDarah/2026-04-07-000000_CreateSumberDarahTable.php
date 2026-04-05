<?php
declare(strict_types=1);

namespace App\Features\Inventori\SumberDarah;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateSumberDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'sumber_darah',
            [
                'id_sumber_darah'         => T::ID8(),
                'nama_sumber_darah'       => T::TEXT(),
            ],
            ['id_sumber_darah'],
            [['nama_sumber_darah']],
            [],
            [],
            true,
            __DIR__ . '/sumber_darah.csv'
        );
    }
}

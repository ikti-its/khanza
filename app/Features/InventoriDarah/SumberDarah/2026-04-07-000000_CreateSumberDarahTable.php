<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateSumberDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
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

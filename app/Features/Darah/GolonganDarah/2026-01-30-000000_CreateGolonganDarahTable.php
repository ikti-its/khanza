<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateGolonganDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'darah',
            'golongan_darah',
            [
                'id_golongan_darah'      => T::ID8(),
                'nama_golongan_darah'    => T::TEXT(),
            ],
            ['id_golongan_darah'],
            [['nama_golongan_darah']],
            [],
            [],
            true,
            __DIR__ . '/golongan_darah.csv'
        );
    }
}

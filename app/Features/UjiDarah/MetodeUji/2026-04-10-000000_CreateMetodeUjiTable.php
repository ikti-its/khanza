<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\MetodeUji;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateMetodeUjiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'metode_uji',
            [
                'id_metode_uji'       => T::ID8(),
                'nama_metode'         => T::TEXT(),
            ],
            'id_metode_uji',
            'nama_metode',
            [],
            true,
            __DIR__ . '/metode_uji.csv'
        );
    }
}

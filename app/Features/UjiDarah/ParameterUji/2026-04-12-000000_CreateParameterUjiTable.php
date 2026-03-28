<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateParameterUjiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'parameter_uji',
            [
                'id_parameter_uji'      => T::ID8(),
                'nama_parameter'        => T::TEXT(),
            ],
            ['id_parameter_uji'],
            [['nama_parameter']],
            [],
            [],
            true,
            __DIR__ . '/parameter_uji.csv'
        );
    }
}

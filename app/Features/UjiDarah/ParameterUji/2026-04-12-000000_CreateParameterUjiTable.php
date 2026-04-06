<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateParameterUjiTable extends Template
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

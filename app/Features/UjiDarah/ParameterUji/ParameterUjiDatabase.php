<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class ParameterUjiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'parameter_uji',
            [
                'id_parameter_uji' => T::ID8(10),
                'nama_parameter'   => T::TEXT(),
            ],
            'id_parameter_uji',
            ['nama_parameter'],
            [],
            true,
            'parameter_uji.csv'
        );
    }
}

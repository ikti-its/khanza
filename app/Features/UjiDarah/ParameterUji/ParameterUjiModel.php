<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ParameterUjiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new ParameterUjiDatabase(),
            [
                'id_parameter_uji' => V::DEFAULT(),
                'nama_parameter'   => V::DEFAULT(),
            ],
            [],
        );
    }
}

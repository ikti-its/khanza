<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;

use App\Core\ModelTemplate;

class ParameterUjiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'uji_darah',
            'parameter_uji',
            'id_parameter_uji',
            [
                'id_parameter_uji' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_parameter' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
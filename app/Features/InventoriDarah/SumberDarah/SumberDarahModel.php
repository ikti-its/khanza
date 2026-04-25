<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;

use App\Core\ModelTemplate;

final class SumberDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'sumber_darah',
            'id_sumber_darah',
            [
                'id_sumber_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_sumber_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
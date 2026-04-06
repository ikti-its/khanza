<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;

use App\Core\ModelTemplate;

class UnitModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori',
            'unit',
            'id_unit',
            [
                'id_unit' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'nama_unit' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
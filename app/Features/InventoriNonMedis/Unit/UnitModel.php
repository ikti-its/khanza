<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class UnitModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'inventori_non_medis',
            'unit',
            'id_unit',
            [
                'id_unit' => V::TODO(),
                'nama_unit' => V::TODO(),
            ],
        );
    }
}

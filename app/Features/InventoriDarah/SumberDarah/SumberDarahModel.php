<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SumberDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'sumber_darah',
            'id_sumber_darah',
            [
                'id_sumber_darah' => V::TODO(),
                'nama_sumber_darah' => V::TODO()
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\MetodeUji;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MetodeUjiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new MetodeUjiDatabase(),
            'REFS',
            'uji_darah',
            'metode_uji',
            'id_metode_uji',
            [
                'id_metode_uji' => V::DEFAULT(),
                'nama_metode'   => V::DEFAULT(),
            ],
            [],
        );
    }
}

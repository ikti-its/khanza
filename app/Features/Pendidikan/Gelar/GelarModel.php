<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\Gelar;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class GelarModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new GelarDatabase(),
            'REFS',
            'pendidikan',
            'gelar',
            'id_gelar',
            [
                'id_gelar'   => V::DEFAULT(),
                'nama_gelar' => V::DEFAULT(),
            ],
            [],
        );
    }
}

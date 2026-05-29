<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefWarnaUrine;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefWarnaUrineModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefWarnaUrineDatabase(),
            [
                'id_warna_urine' => V::DEFAULT(),
                'nama_warna'     => V::DEFAULT(),
            ],
            [],
        );
    }
}

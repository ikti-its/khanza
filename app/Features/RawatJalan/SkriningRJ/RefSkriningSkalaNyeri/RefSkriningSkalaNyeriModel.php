<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefSkriningSkalaNyeriModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefSkriningSkalaNyeriDatabase(),
            'REFS',
            'skrining_rj',
            'ref_skrining_skala_nyeri',
            'id_skala_nyeri',
            [
                'id_skala_nyeri' => V::DEFAULT(),
                'skala_nyeri'    => V::DEFAULT(),
            ],
            [],
        );
    }
}

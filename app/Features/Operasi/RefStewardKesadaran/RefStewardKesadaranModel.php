<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardKesadaran;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStewardKesadaranModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStewardKesadaranDatabase(),
            'REFS',
            'operasi',
            'ref_steward_kesadaran',
            'id_kesadaran',
            [
                'id_kesadaran' => V::DEFAULT(),
                'nama_skala'   => V::DEFAULT(),
                'nilai'        => V::DEFAULT(),
            ],
            [],
        );
    }
}

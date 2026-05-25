<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStewardMotorikModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStewardMotorikDatabase(),
            'REFS',
            'operasi',
            'ref_steward_motorik',
            'id_motorik',
            [
                'id_motorik' => V::DEFAULT(),
                'nama_skala' => V::DEFAULT(),
                'nilai'      => V::DEFAULT(),
            ],
            [],
        );
    }
}

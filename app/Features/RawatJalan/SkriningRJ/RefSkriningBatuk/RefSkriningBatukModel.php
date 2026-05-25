<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningBatuk;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefSkriningBatukModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefSkriningBatukDatabase(),
            'REFS',
            'skrining_rj',
            'ref_skrining_batuk',
            'id_batuk',
            [
                'id_batuk'       => V::DEFAULT(),
                'kategori_batuk' => V::DEFAULT(),
            ],
            [],
        );
    }
}

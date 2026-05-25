<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteTekananDarah;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAldretteTekananDarahModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAldretteTekananDarahDatabase(),
            'REFS',
            'operasi',
            'ref_aldrette_tekanan_darah',
            'id_td',
            [
                'id_td'      => V::DEFAULT(),
                'nama_skala' => V::DEFAULT(),
                'nilai'      => V::DEFAULT(),
            ],
            [],
        );
    }
}

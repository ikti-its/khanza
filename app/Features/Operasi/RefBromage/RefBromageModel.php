<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefBromageModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefBromageDatabase(),
            [
                'id_bromage'   => V::DEFAULT(),
                'nama_skala'   => V::DEFAULT(),
                'tingkat_blok' => V::DEFAULT(),
                'nilai'        => V::DEFAULT(),
                'gambar'       => V::DEFAULT(),
            ],
            [],
        );
    }
}

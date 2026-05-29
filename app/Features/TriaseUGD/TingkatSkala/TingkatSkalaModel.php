<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TingkatSkalaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TingkatSkalaDatabase(),
            [
                'id_tingkat'   => V::DEFAULT(),
                'nama_tingkat' => V::DEFAULT(),
            ],
            [],
        );
    }
}

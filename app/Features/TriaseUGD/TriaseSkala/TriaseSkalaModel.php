<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriaseSkalaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TriaseSkalaDatabase(),
            [
                'id_skala'   => V::DEFAULT(),
                'kode_skala' => V::DEFAULT(),
                'pengkajian' => V::DEFAULT(),
            ],
            [
                'id_tingkat_skala' => ['nama_tingkat'],
                'id_pemeriksaan'   => ['nama_pemeriksaan'],
            ],
        );
    }
}

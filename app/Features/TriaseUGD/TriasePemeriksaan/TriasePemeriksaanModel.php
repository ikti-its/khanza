<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriasePemeriksaanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TriasePemeriksaanDatabase(),
            [
                'id_pemeriksaan'   => V::DEFAULT(),
                'kode_pemeriksaan' => V::DEFAULT(),
                'nama_pemeriksaan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

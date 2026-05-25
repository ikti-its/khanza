<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class CaraMasukModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new CaraMasukDatabase(),
            'REFS',
            'triase_ugd',
            'cara_masuk',
            'id_cara',
            [
                'id_cara'   => V::DEFAULT(),
                'nama_cara' => V::DEFAULT(),
            ],
            [],
        );
    }
}

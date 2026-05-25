<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriaseMacamKasusModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TriaseMacamKasusDatabase(),
            'BASE',
            'triase_ugd',
            'triase_macam_kasus',
            'id_macam_kasus',
            [
                'id_macam_kasus'   => V::DEFAULT(),
                'kode_macam_kasus' => V::DEFAULT(),
                'nama_macam_kasus' => V::DEFAULT(),
            ],
            [],
        );
    }
}

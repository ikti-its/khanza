<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Lembur;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class LemburModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new LemburDatabase(),
            'BASE',
            'penggajian',
            'lembur',
            'no_lembur',
            [
                'no_lembur'    => V::DEFAULT(),
                'jenis_lembur' => V::DEFAULT(),
                'jam_lembur'   => V::DEFAULT(),
                'pengali_upah' => V::DEFAULT(),
            ],
            [],
        );
    }
}

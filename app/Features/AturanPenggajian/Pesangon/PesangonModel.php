<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Pesangon;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PesangonModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PesangonDatabase(),
            [
                'no_pesangon'  => V::DEFAULT(),
                'masa_kerja'   => V::DEFAULT(),
                'pengali_upah' => V::DEFAULT(),
            ],
            [],
        );
    }
}

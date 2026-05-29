<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PilihanJawabanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PilihanJawabanDatabase(),
            [
                'id_pilihan'   => V::DEFAULT(),
                'nama_pilihan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

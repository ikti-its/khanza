<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PertanyaanKonselingModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PertanyaanKonselingDatabase(),
            [
                'id_pertanyaan'   => V::DEFAULT(),
                'teks_pertanyaan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

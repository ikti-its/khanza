<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JawabanKonselingModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JawabanKonselingDatabase(),
            [
                'id_jawaban' => V::DEFAULT(),
            ],
            [
                'id_konseling'  => ['tanggal_konseling'],
                'id_pertanyaan' => ['teks_pertanyaan'],
                'id_pilihan'    => ['nama_pilihan'],
            ],
        );
    }
}

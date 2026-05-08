<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JawabanKonselingModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'jawaban_konseling',
            'id_jawaban',
            [
                'id_jawaban' => V::TODO(),
                'id_konseling' => V::TODO(),
                'id_pertanyaan' => V::TODO(),
                'id_pilihan' => V::TODO()
            ],
        );
    }
}
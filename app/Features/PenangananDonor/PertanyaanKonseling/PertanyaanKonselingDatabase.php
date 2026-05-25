<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PertanyaanKonselingDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'penanganan_donor',
            'pertanyaan_konseling',
            [
                'id_pertanyaan'   => T::ID(10),
                'teks_pertanyaan' => T::TEXT(),
            ],
            'id_pertanyaan',
            [],
            [],
            true,
            'pertanyaan_konseling.csv',
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PilihanJawabanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'penanganan_donor',
            'pilihan_jawaban',
            [
                'id_pilihan'   => T::ID(3),
                'nama_pilihan' => T::NAME(15),
            ],
            'id_pilihan',
            ['nama_pilihan'],
            [],
            true,
            'pilihan_jawaban.csv',
        );
    }
}

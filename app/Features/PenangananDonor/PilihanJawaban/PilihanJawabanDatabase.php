<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PilihanJawabanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'pilihan_jawaban',
            [
                'id_pilihan'   => T::ID8(2),
                'nama_pilihan' => T::TEXT(),
            ],
            'id_pilihan',
            ['nama_pilihan'],
            [],
            true,
            'pilihan_jawaban.csv'
        );
    }
}

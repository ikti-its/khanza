<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePilihanJawabanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'pilihan_jawaban',
            [
                'id_pilihan'        => T::ID8(),
                'nama_pilihan'      => T::TEXT(),
            ],
            ['id_pilihan'],
            [['nama_pilihan']],
            [],
            [],
            true,
            __DIR__ . '/pilihan_jawaban.csv'
        );
    }
}

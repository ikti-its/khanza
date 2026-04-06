<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePertanyaanKonselingTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'pertanyaan_konseling',
            [
                'id_pertanyaan'     => T::ID8(),
                'teks_pertanyaan'   => T::TEXT(),
            ],
            ['id_pertanyaan'],
            [],
            [],
            [],
            true,
            __DIR__ . '/pertanyaan_konseling.csv'
        );
    }
}

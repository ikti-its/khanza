<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateJawabanKonselingTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'jawaban_konseling',
            [
                'id_jawaban'       => T::ID32(),
                'id_konseling'     => T::INT32(),
                'id_pertanyaan'    => T::INT8(),
                'id_pilihan'       => T::INT8(),
            ],
            'id_jawaban',
            [['id_konseling', 'id_pertanyaan']],
            [
                ['id_konseling', 'konseling', 'id_konseling'],
                ['id_pertanyaan', 'pertanyaan_konseling', 'id_pertanyaan'],
                ['id_pilihan', 'pilihan_jawaban', 'id_pilihan'],
            ],
            false,
            __DIR__ . '/jawaban_konseling.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateJawabanKonselingTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'jawaban_konseling',
            [
                'id_jawaban'       => T::ID32(),
                'id_konseling'     => T::ID32(),
                'id_pertanyaan'    => T::ID8(),
                'id_pilihan'       => T::ID8(),
            ],
            ['id_jawaban'],
            [['id_konseling', 'id_pertanyaan']],
            [
                [['id_konseling'], 'konseling', ['id_konseling'], 'CASCADE', 'CASCADE'],
                [['id_pertanyaan'], 'pertanyaan_konseling', ['id_pertanyaan'], 'CASCADE', 'CASCADE'],
                [['id_pilihan'], 'pilihan_jawaban', ['id_pilihan'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

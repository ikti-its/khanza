<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JawabanKonselingDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'jawaban_konseling',
            [
                'id_jawaban'    => T::ID(30_000_000),
                'id_konseling'  => T::FK_AUTO(),
                'id_pertanyaan' => T::FK_AUTO(),
                'id_pilihan'    => T::FK_AUTO(),
            ],
            'id_jawaban',
            [['id_konseling', 'id_pertanyaan']],
            [
                [
                    'id_konseling', 
                    \App\Features\PenangananDonor\Konseling\KonselingDatabase::class, 
                    'id_konseling'
                ],
                [
                    'id_pertanyaan', 
                    \App\Features\PenangananDonor\PertanyaanKonseling\PertanyaanKonselingDatabase::class, 
                    'id_pertanyaan'
                ],
                [
                    'id_pilihan', 
                    \App\Features\PenangananDonor\PilihanJawaban\PilihanJawabanDatabase::class, 
                    'id_pilihan'
                ],
            ],
            false,
            'jawaban_konseling.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class KonselingDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'konseling',
            [
                'id_konseling'          => T::ID32(5_000_000),
                'id_kasus'              => T::FK_AUTO(),
                'tanggal_konseling'     => T::DATE(),
                'id_petugas'            => T::FK_AUTO(),
            ],
            'id_konseling',
            ['id_kasus'],
            [
                [
                    'id_kasus', 
                    \App\Features\PenangananDonor\KasusReaktif\KasusReaktifDatabase::class, 
                    'id_kasus'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'konseling.csv'
        );
    }
}

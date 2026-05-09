<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class TriaseSkalaDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_skala',
            [
                'id_skala'         => T::ID16(200),
                'id_tingkat_skala' => T::FK_AUTO(),
                'kode_skala'       => T::TEXT(),
                'id_pemeriksaan'   => T::FK_AUTO(),
                'pengkajian'       => T::TEXT(),
            ],
            'id_skala',
            [
                ['id_tingkat_skala', 'kode_skala'], 
                ['id_tingkat_skala', 'id_pemeriksaan', 'pengkajian']
            ],
            [
                [
                    'id_tingkat_skala', 
                    \App\Features\TriaseUGD\TingkatSkala\TingkatSkalaDatabase::class, 
                    'id_tingkat'
                ],
                [
                    'id_pemeriksaan', 
                    \App\Features\TriaseUGD\TriasePemeriksaan\TriasePemeriksaanDatabase::class, 
                    'id_pemeriksaan'
                ],
            ],
            true,
            'triase_skala.csv'
        );
    }
}

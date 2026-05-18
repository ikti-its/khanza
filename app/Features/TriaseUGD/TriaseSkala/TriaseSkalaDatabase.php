<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TriaseSkalaDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_skala',
            [
                'id_skala'         => T::ID(200),
                'id_tingkat_skala' => T::FK_AUTO(),
                'kode_skala'       => T::CODE(3),
                'id_pemeriksaan'   => T::FK_AUTO(),
                'pengkajian'       => T::NAME(100),
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

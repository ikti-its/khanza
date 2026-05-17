<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class UpahMinimumKotakab extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_kotakab',
            [
                'no_ump'       => T::ID(30000),
                'tahun'        => T::YEAR('tahun'),
                'kotakab'      => T::FK_AUTO(),
                'upah_minimum' => T::MONEY(),
            ],
            'no_ump',
            [
                ['tahun', 'kotakab'],
            ],
            [
                [
                    'kotakab',
                    \App\Features\Lokasi\Kota\KotaDatabase::class, 
                    'id_kota'
                ]
                
            ],            
        );
    }
}

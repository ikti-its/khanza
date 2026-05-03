<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class UpahMinimumKotakab extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_kotakab',
            [
                'no_ump'       => T::ID16(30000),
                'tahun'        => T::YEAR(),
                'kotakab'      => T::FK_AUTO(),
                'upah_minimum' => T::INT32(),
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

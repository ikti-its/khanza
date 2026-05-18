<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumKotakab;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class UpahMinimumKotakabDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'umk',
            [
                'no_umk'       => T::ID(30000),
                'tahun'        => T::YEAR('tahun'),
                'kotakab'      => T::FK_AUTO(),
                'upah_minimum' => T::MONEY(),
            ],
            'no_umk',
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

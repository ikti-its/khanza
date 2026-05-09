<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class HasilUjiSaringDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_uji_saring',
            [
                'id_uji_saring' => T::ID32(100_000_000),
                'id_bag'        => T::FK_AUTO(),
                'id_metode_uji' => T::FK_AUTO(),
                'tanggal_uji'   => T::DATE(),
                'id_petugas'    => T::FK_AUTO(),
            ],
            'id_uji_saring',
            ['id_bag'],
            [
                [
                    'id_bag',
                    \App\Features\InventoriDarah\KantongDarah\KantongDarahDatabase::class, 
                    'id_bag'
                ],
                [
                    'id_metode_uji', 
                    \App\Features\UjiDarah\MetodeUji\MetodeUjiDatabase::class, 
                    'id_metode_uji'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'hasil_uji_saring.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class HasilUjiSaringDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_uji_saring_detail',
            [
                'id_uji_saring_detail'      => T::ID32(500_000_000),
                'id_uji_saring'             => T::FK_AUTO(),
                'id_parameter_uji'          => T::FK_AUTO(),
                'id_nilai_saring'           => T::FK_AUTO(),
                'nilai_absorbance'          => T::F32()->nullable(),
            ],
            'id_uji_saring_detail',
            [['id_uji_saring', 'id_parameter_uji']],
            [
                [
                    'id_uji_saring', 
                    \App\Features\UjiDarah\HasilUjiSaring\HasilUjiSaringDatabase::class, 
                    'id_uji_saring'
                ],
                [
                    'id_parameter_uji', 
                    \App\Features\UjiDarah\ParameterUji\ParameterUjiDatabase::class, 
                    'id_parameter_uji'
                ],
                [
                    'id_nilai_saring', 
                    \App\Features\UjiDarah\NilaiSaring\NilaiSaringDatabase::class, 
                    'id_nilai_saring'
                ],
            ],
            false,
            'hasil_uji_saring_detail.csv'
        );
    }
}

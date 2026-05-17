<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadTindakan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class HasilRadTindakanDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad_tindakan',
        [
            'id_hasil_tindakan'       => T::ID(100_000_000),
            'id_hasil_rad'            => T::FK_AUTO(),
            'id_item_rad'             => T::FK_AUTO(),
            'tarif_tindakan'          => T::F32(),
            'kilovoltage_kv'          => T::F32(),
            'milliampere_second_mas'  => T::F32(),
            'focus_film_distance_ffd' => T::F32(),
            'back_scatter_factor_bsf' => T::F32(),
            'inaktivasi'              => T::TEXT(),
            'jumlah_penyinaran'       => T::INT32(),
            'dosis_radiasi'           => T::TEXT(),
            'hasil_ekspertise'        => T::TEXT(),
            'id_template_rad'         => T::FK_AUTO(),
        ],
        'id_hasil_tindakan',
        [],
        [
            [
                ['id_hasil_rad'],
                \App\Features\Radiologi\HasilRad\HasilRadDatabase::class,
                ['id_hasil_rad']
            ],
            [
                ['id_item_rad'],
                \App\Features\Radiologi\RefItemRad\RefItemRadDatabase::class,
                ['id_item']
            ],
            [
                ['id_template_rad'],
                \App\Features\Radiologi\RefTemplateRad\RefTemplateRadDatabase::class,
                ['id_template']
            ],
        ],
    );
}
}

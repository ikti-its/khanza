<?php

namespace App\Features\Radiolgi\HasilRadTindakan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateHasilRadTindakanTable extends Template
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad_tindakan',
        [
            'id_hasil_tindakan'         => T::ID64(),
            'id_hasil_rad'              => T::ID64(),
            'id_item_rad'               => T::ID32(),
            'tarif_tindakan'            => T::F32(),
            'kilovoltage_kv'            => T::F32(),
            'milliampere_second_mas'    => T::F32(),
            'focus_film_distance_ffd'   => T::F32(),
            'back_scatter_factor_bsf'   => T::F32(),
            'inaktivasi'                => T::TEXT(),
            'jumlah_penyinaran'         => T::INT32(),
            'dosis_radiasi'             => T::TEXT(),
            'hasil_ekspertise'          => T::TEXT(),
            'id_template_rad'           => T::INT32()->nullable(),
        ],
        ['id_hasil_tindakan'],
        [],
        [
            [['id_hasil_rad'], 'radiologi.hasil_rad', ['id_hasil_rad'], 'CASCADE', 'CASCADE'],
            [['id_item_rad'], 'radiologi.ref_item_rad', ['id_item'], 'CASCADE', 'RESTRICT'],
            [['id_template_rad'], 'radiologi.ref_template_rad', ['id_template'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_hasil_rad']]
    );
}
}

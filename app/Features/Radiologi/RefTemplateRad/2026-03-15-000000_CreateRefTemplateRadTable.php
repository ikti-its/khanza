<?php

namespace App\Features\Radiolgi\RefTemplateRad;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefTemplateRadTable extends Template
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_template_rad',
        [
            'id_template'        => T::ID32(),
            'nama_template'      => T::TEXT(),
            'isi_teks_ekspertise'=> T::TEXT(),
        ],
        ['id_template'],
        [],
        [],
        [],
        false,
        __DIR__ . '/template_rad.csv'
    );
}
}

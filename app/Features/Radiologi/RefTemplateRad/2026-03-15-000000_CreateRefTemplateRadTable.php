<?php

namespace App\Features\Radiolgi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefTemplateRadTable extends DatabaseTemplate
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

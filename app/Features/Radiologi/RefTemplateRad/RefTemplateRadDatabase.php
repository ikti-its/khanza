<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefTemplateRadDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_template_rad',
        [
            'id_template'        => T::ID8(100),
            'nama_template'      => T::TEXT(),
            'isi_teks_ekspertise'=> T::TEXT(),
        ],
        'id_template',
        [],
        [],
        false,
        'template_rad.csv'
    );
}
}

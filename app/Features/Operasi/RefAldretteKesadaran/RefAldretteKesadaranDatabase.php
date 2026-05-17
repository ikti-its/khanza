<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteKesadaran;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAldretteKesadaranDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_kesadaran',
        [
            'id_kesadaran' => T::ID(10),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::SCORE(),
        ],
        'id_kesadaran',
        [],
        [],
        true,
        'aldrette_kesadaran.csv'
    );
}
}

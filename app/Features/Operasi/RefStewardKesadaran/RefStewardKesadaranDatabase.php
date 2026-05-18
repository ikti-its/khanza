<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardKesadaran;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStewardKesadaranDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_steward_kesadaran',
        [
            'id_kesadaran' => T::ID(5),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::SCORE(),
        ],
        'id_kesadaran',
        [],
        [],
        true,
        'steward_kesadaran.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefSkriningKesadaranDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_kesadaran',
        [
            'id_kesadaran' => T::ID8(10),
            'kesadaran'    => T::TEXT(),
        ],
        'id_kesadaran',
        [],
        [],
        true,
        'skrining_kesadaran.csv'
    );
}
}

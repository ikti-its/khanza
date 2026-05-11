<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefKesadaranDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_kesadaran',
        [
            'id_kesadaran'   => T::ID8(15),
            'nama_kesadaran' => T::TEXT(),
        ],
        'id_kesadaran',
        [],
        [],
        true,
        'kesadaran.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStewardMotorikDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_steward_motorik',
        [
            'id_motorik'  => T::ID8(5),
            'nama_skala'  => T::TEXT(),
            'nilai'       => T::INT8(),
        ],
        'id_motorik',
        [],
        [],
        true,
        'steward_motorik.csv'
    );
}
}

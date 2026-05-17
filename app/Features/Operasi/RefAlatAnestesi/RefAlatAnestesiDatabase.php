<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAlatAnestesi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAlatAnestesiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_alat_anestesi',
        [
            'id_alat'    => T::ID(10),
            'nama_alat'  => T::NAME(100),
        ],
        'id_alat',
        ['nama_alat'],
        [],
        true,
        'alat_anestesi.csv'
    );
}
}

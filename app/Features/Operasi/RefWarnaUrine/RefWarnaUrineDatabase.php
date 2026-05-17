<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefWarnaUrine;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefWarnaUrineDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_warna_urine',
        [
            'id_warna_urine' => T::ID8(10),
            'nama_warna'     => T::TEXT(),
        ],
        'id_warna_urine',
        [],
        [],
        true,
        'warna_urine.csv'
    );
}
}

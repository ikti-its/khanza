<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStatusPenayanganDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_status_penayangan',
        [
            'id_status_penayangan' => T::ID8(5),
            'nama_status'          => T::TEXT(),
        ],
        'id_status_penayangan',
        [],
        [],
        true,
        'status_penayangan.csv'
    );
}
}

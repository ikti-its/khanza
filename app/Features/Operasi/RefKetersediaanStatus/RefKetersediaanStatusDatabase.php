<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefKetersediaanStatusDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_ketersediaan_status',
        [
            'id_ketersediaan_status' => T::ID(5),
            'nama_ketersediaan'      => T::TEXT(),
        ],
        'id_ketersediaan_status',
        [],
        [],
        true,
        'ketersediaan_status.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStatusOperasiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_status_operasi',
        [
            'id_status'   => T::ID(5),
            'nama_status' => T::TEXT(),
        ],
        'id_status',
        [],
        [],
        true,
        'status_operasi.csv'
    );
}
}

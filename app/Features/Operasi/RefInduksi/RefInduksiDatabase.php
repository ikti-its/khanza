<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefInduksiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_induksi',
        [
            'id_induksi'   => T::ID(10),
            'nama_induksi' => T::TEXT(),
        ],
        'id_induksi',
        [],
        [],
        true,
        'induksi.csv'
    );
}
}

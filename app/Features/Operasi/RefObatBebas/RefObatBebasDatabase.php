<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefObatBebasDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_obat_bebas',
        [
            'id_obat_bebas'  => T::ID(5),
            'nama_kategori'  => T::TEXT(),
        ],
        'id_obat_bebas',
        [],
        [],
        true,
        'obat_bebas.csv'
    );
}
}

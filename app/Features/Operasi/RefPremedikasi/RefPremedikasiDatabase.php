<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefPremedikasiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_premedikasi',
        [
            'id_premedikasi'   => T::ID(5),
            'nama_premedikasi' => T::TEXT(),
        ],
        'id_premedikasi',
        [],
        [],
        true,
        'premedikasi.csv'
    );
}
}

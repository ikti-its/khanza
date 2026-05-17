<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAngkaAsa;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAngkaAsaDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_angka_asa',
        [
            'id_asa'   => T::ID(10),
            'nama_asa' => T::TEXT(),
        ],
        'id_asa',
        [],
        [],
        true,
        'angka_asa.csv'
    );
}
}

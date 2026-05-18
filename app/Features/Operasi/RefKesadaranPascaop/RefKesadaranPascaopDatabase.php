<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefKesadaranPascaopDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_kesadaran_pascaop',
        [
            'id_kesadaran'   => T::ID(5),
            'nama_kesadaran' => T::TEXT(),
        ],
        'id_kesadaran',
        [],
        [],
        true,
        'kesadaran_pascaop.csv'
    );
}
}

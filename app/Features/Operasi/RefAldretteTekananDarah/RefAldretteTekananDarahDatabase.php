<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteTekananDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAldretteTekananDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_tekanan_darah',
        [
            'id_td'      => T::ID8(10),
            'nama_skala' => T::TEXT(),
            'nilai'      => T::INT8(),
        ],
        'id_td',
        [],
        [],
        true,
        'aldrette_tekanan_darah.csv'
    );
}
}

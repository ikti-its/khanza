<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteRespirasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAldretteRespirasiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_respirasi',
        [
            'id_respirasi' => T::ID(10),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::SCORE(),
        ],
        'id_respirasi',
        [],
        [],
        true,
        'aldrette_respirasi.csv'
    );
}
}

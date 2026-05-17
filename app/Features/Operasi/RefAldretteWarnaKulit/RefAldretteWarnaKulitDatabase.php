<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAldretteWarnaKulitDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_warna_kulit',
        [
            'id_warna'   => T::ID(10),
            'nama_skala' => T::TEXT(),
            'nilai'        => T::SCORE(),
        ],
        'id_warna',
        ['nilai'],
        [],
        true,
        'aldrette_warna_kulit.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefBromageDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_bromage',
        [
            'id_bromage'   => T::ID(10),
            'nama_skala'   => T::TEXT(),
            'tingkat_blok' => T::TEXT(),
            'nilai'        => T::VITAL(0, 10),
            'gambar'       => T::TEXT()->nullable(),
        ],
        'id_bromage',
        ['nilai'],
        [],
        true,
        'bromage.csv'
    );
}
}

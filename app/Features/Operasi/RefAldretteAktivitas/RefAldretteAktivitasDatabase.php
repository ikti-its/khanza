<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefAldretteAktivitasDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_aldrette_aktivitas',
        [
            'id_aktivitas' => T::ID(10),
            'nama_skala'   => T::TEXT(),
            'nilai'        => T::VITAL(0, 10),
        ],
        'id_aktivitas',
        ['nilai'],
        [],
        true,
        'aldrette_aktivitas.csv'
    );
}
}

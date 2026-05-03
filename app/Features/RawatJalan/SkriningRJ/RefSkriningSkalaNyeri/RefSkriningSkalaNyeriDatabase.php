<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class RefSkriningSkalaNyeriDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_skala_nyeri',
        [
            'id_skala_nyeri' => T::ID8(10),
            'skala_nyeri'    => T::TEXT(),
        ],
        'id_skala_nyeri',
        [],
        [],
        true,
        'skrining_skala_nyeri.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class RefSkriningKeputusanDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'ref_skrining_keputusan',
        [
            'id_keputusan'       => T::ID8(5),
            'skrining_keputusan' => T::TEXT(),
        ],
        'id_keputusan',
        [],
        [],
        true,
        'skrining_keputusan.csv'
    );
}
}

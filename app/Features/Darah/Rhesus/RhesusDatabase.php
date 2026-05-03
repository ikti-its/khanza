<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class RhesusDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'rhesus',
            [
                'id_rhesus'      => T::ID8(2),
                'kode_rhesus'    => T::TEXT(),
            ],
            'id_rhesus',
            ['kode_rhesus'],
            [],
            true,
            'rhesus.csv'
        );
    }
}

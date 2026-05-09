<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RhesusDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'rhesus',
            [
                'id_rhesus'      => T::ID8(2),
                'kode_rhesus'    => T::CODE(),
            ],
            'id_rhesus',
            ['kode_rhesus'],
            [],
            true,
            'rhesus.csv'
        );
    }
}

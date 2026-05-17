<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RhesusDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'rhesus',
            [
                'id_rhesus'      => T::ID(2),
                'kode_rhesus'    => T::CODE(1),
            ],
            'id_rhesus',
            ['kode_rhesus'],
            [],
            true,
            'rhesus.csv'
        );
    }
}

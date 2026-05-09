<?php

namespace App\Features\Person\Pernikahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PernikahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'pernikahan',
            [
                'id_pernikahan'     => T::ID8(10),
                'status_pernikahan' => T::NAME(),
            ],
            'id_pernikahan',
            ['status_pernikahan'],
            [],
            true,
            'pernikahan.csv'
        );
    }
}

<?php

namespace App\Features\Person\Agama;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class AgamaDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'agama',
            [
                'id_agama'   => T::ID8(7),
                'nama_agama' => T::NAME(),
            ],
            'id_agama',
            ['nama_agama'],
            [],
            true,
            'agama.csv'
        );
    }
}

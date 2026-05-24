<?php
declare(strict_types=1);

namespace App\Features\Person\Pernikahan;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PernikahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'pernikahan',
            [
                'id_pernikahan'     => T::ID(10),
                'status_pernikahan' => T::NAME(20),
            ],
            'id_pernikahan',
            ['status_pernikahan'],
            [],
            true,
            'pernikahan.csv'
        );
    }
}

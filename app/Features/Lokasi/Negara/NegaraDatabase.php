<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Negara;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class NegaraDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'lokasi',
            'negara',
            [
                'id_negara'    => T::ID(200),
                'nama_negara'  => T::NAME(30),
                'kode_telepon' => T::CODE(3),
            ],
            'id_negara',
            ['nama_negara'],
            [],
        );
    }
}

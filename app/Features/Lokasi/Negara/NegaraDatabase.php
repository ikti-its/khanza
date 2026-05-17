<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Negara;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class NegaraDatabase extends DatabaseTemplate
{   
    public function __construct(){
        parent::__construct(
            'lokasi',
            'negara',
            [
                'id_negara'    => T::ID16(200),
                'nama_negara'  => T::TEXT(),
                'kode_telepon' => T::INT16(),
            ],
            'id_negara',
            ['nama_negara'],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\Gelar;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class GelarDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'gelar',
            [
                'id_gelar'   => T::ID(100),
                'nama_gelar' => T::TEXT(),
            ],
            'id_gelar',
            ['nama_gelar'],
            [],
        );
    }
}

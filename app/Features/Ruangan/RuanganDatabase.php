<?php
declare(strict_types=1);

namespace App\Features\Ruangan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RuanganDatabase extends DatabaseTemplate
{
    public function __construct() {
        parent::__construct(
            'ruangan',
            'ruangan',
            [
                'id_ruangan'     => T::ID(50),
                'kode_ruangan'   => T::CODE(5),
                'nama_ruangan'   => T::TEXT(),
                'jenis_instalasi'=> T::TEXT(),
            ],
            'id_ruangan',             
            ['kode_ruangan'],
            [],
            false,
            'master_ruangan.csv' 
        );
    }
}
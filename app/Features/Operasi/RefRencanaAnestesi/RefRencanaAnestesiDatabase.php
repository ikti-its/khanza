<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRencanaAnestesi;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefRencanaAnestesiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_rencana_anestesi',
        [
            'id_rencana_anestesi' => T::ID(10),
            'nama_rencana'        => T::TEXT(),
        ],
        'id_rencana_anestesi',
        [],
        [],
        true,
        'rencana_anestesi.csv'
    );
}
}

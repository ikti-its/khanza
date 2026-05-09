<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStatusPermintaanDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_status_permintaan',
        [
            'id_status'   => T::ID8(10),
            'nama_status' => T::TEXT(),
        ],
        'id_status',
        [],
        [],
        true,
        'status_permintaan.csv'
    );
}
}

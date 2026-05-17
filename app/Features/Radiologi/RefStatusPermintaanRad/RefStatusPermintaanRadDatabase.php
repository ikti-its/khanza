<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefStatusPermintaanRad;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefStatusPermintaanRadDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_status_permintaan_rad',
        [
            'id_status'   => T::ID8(10),
            'nama_status' => T::TEXT(),
        ],
        'id_status',
        [],
        [],
        true,
        'status_permintaan_rad.csv'
    );
}
}

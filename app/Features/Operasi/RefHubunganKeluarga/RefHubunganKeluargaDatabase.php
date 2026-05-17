<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefHubunganKeluarga;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefHubunganKeluargaDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_hubungan_keluarga',
        [
            'id_hubungan_keluarga' => T::ID(15),
            'nama_hubungan'        => T::TEXT(),
        ],
        'id_hubungan_keluarga',
        [],
        [],
        true,
        'hubungan_keluarga.csv'
    );
}
}

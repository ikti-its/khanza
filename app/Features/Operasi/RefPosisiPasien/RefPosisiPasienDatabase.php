<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefPosisiPasienDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_posisi_pasien',
        [
            'id_posisi'   => T::ID(10),
            'nama_posisi' => T::TEXT(),
        ],
        'id_posisi',
        [],
        [],
        true,
        'posisi_pasien.csv'
    );
}
}

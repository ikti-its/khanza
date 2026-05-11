<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefIndikasiPindahDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_indikasi_pindah',
        [
            'id_indikasi'   => T::ID8(10),
            'nama_indikasi' => T::TEXT(),
        ],
        'id_indikasi',
        [],
        [],
        true,
        'indikasi_pindah.csv'
    );
}
}

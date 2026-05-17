<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefRuanganOperasiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_ruangan_operasi',
        [
            'id_ruangan'   => T::ID(5),
            'kode_ruangan' => T::CODE(10),
            'nama_ruangan' => T::TEXT(),
        ],
        'id_ruangan',
        ['kode_ruangan'],
        [],
        false,
        'ruangan_operasi.csv'
    );
}
}

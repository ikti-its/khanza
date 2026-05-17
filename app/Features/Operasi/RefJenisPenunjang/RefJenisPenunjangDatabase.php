<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisPenunjang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefJenisPenunjangDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_jenis_penunjang',
        [
            'id_jenis_penunjang' => T::ID(10),
            'nama_jenis'         => T::TEXT(),
        ],
        'id_jenis_penunjang',
        [],
        [],
        true,
        'jenis_penunjang.csv'
    );
}
}

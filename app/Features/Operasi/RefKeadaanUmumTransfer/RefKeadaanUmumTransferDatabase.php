<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmumTransfer;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefKeadaanUmumTransferDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_keadaan_umum_transfer',
        [
            'id_keadaan_umum' => T::ID(5),
            'nama_keadaan'    => T::TEXT(),
        ],
        'id_keadaan_umum',
        [],
        [],
        true,
        'keadaan_umum_transfer.csv'
    );
}
}

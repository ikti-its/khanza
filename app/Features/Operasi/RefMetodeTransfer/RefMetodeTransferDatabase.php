<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefMetodeTransferDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_metode_transfer',
        [
            'id_metode'   => T::ID8(10),
            'nama_metode' => T::TEXT(),
        ],
        'id_metode',
        [],
        [],
        true,
        'metode_transfer.csv'
    );
}
}

<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefPeralatanTransferDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'ref_peralatan_transfer',
        [
            'id_peralatan'   => T::ID(10),
            'nama_peralatan' => T::TEXT(),
        ],
        'id_peralatan',
        [],
        [],
        true,
        'peralatan_transfer.csv'
    );
}
}

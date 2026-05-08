<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefPeralatanTransferModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_peralatan_transfer',
            'id_peralatan',
            [
                'id_peralatan' => V::TODO(),
                'nama_peralatan' => V::TODO(),
            ],
        );
    }
}
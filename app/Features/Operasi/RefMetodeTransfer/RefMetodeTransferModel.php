<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefMetodeTransferModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RefMetodeTransferDatabase(),
            'REFS',
            'operasi',
            'ref_metode_transfer',
            'id_metode',
            [
                'id_metode'   => V::DEFAULT(),
                'nama_metode' => V::DEFAULT(),
            ],
            []
        );
    }
}
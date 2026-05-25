<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmumTransfer;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKeadaanUmumTransferModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKeadaanUmumTransferDatabase(),
            'REFS',
            'operasi',
            'ref_keadaan_umum_transfer',
            'id_keadaan_umum',
            [
                'id_keadaan_umum' => V::DEFAULT(),
                'nama_keadaan'    => V::DEFAULT(),
            ],
            [],
        );
    }
}

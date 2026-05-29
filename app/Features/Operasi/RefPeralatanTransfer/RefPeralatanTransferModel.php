<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefPeralatanTransferModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefPeralatanTransferDatabase(),
            [
                'id_peralatan'   => V::DEFAULT(),
                'nama_peralatan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

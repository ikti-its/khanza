<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusOperasiDatabase(),
            'REFS',
            'operasi',
            'ref_status_operasi',
            'id_status',
            [
                'id_status'   => V::DEFAULT(),
                'nama_status' => V::DEFAULT(),
            ],
            [],
        );
    }
}

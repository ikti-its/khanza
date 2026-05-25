<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefInduksiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefInduksiDatabase(),
            'REFS',
            'operasi',
            'ref_induksi',
            'id_induksi',
            [
                'id_induksi'   => V::DEFAULT(),
                'nama_induksi' => V::DEFAULT(),
            ],
            [],
        );
    }
}

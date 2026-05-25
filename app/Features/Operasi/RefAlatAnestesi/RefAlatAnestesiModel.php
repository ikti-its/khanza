<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAlatAnestesi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAlatAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAlatAnestesiDatabase(),
            'REFS',
            'operasi',
            'ref_alat_anestesi',
            'id_alat',
            [
                'id_alat'   => V::DEFAULT(),
                'nama_alat' => V::DEFAULT(),
            ],
            [],
        );
    }
}

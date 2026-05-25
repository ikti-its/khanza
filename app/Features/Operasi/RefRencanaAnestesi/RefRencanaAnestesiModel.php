<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRencanaAnestesi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefRencanaAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefRencanaAnestesiDatabase(),
            'REFS',
            'operasi',
            'ref_rencana_anestesi',
            'id_rencana_anestesi',
            [
                'id_rencana_anestesi' => V::DEFAULT(),
                'nama_rencana'        => V::DEFAULT(),
            ],
            [],
        );
    }
}

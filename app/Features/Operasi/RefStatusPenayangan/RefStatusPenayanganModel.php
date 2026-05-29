<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusPenayanganModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusPenayanganDatabase(),
            [
                'id_status_penayangan' => V::DEFAULT(),
                'nama_status'          => V::DEFAULT(),
            ],
            [],
        );
    }
}

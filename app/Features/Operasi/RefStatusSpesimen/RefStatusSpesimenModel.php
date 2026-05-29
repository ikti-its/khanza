<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusSpesimenModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusSpesimenDatabase(),
            [
                'id_status_spesimen' => V::DEFAULT(),
                'nama_status'        => V::DEFAULT(),
            ],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusPermintaanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusPermintaanDatabase(),
            [
                'id_status'   => V::DEFAULT(),
                'nama_status' => V::DEFAULT(),
            ],
            [],
        );
    }
}

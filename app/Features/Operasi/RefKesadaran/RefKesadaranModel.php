<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKesadaranModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKesadaranDatabase(),
            [
                'id_kesadaran'   => V::DEFAULT(),
                'nama_kesadaran' => V::DEFAULT(),
            ],
            [],
        );
    }
}

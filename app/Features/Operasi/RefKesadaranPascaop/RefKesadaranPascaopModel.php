<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKesadaranPascaopModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKesadaranPascaopDatabase(),
            [
                'id_kesadaran'   => V::DEFAULT(),
                'nama_kesadaran' => V::DEFAULT(),
            ],
            [],
        );
    }
}

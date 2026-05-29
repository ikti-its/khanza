<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefPosisiPasienModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefPosisiPasienDatabase(),
            [
                'id_posisi'   => V::DEFAULT(),
                'nama_posisi' => V::DEFAULT(),
            ],
            [],
        );
    }
}

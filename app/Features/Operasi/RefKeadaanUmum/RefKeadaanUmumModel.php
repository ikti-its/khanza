<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmum;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKeadaanUmumModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKeadaanUmumDatabase(),
            [
                'id_keadaan_umum' => V::DEFAULT(),
                'nama_keadaan'    => V::DEFAULT(),
            ],
            [],
        );
    }
}

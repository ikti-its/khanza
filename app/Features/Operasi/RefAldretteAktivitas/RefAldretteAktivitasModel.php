<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAldretteAktivitasModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAldretteAktivitasDatabase(),
            [
                'id_aktivitas' => V::DEFAULT(),
                'nama_skala'   => V::DEFAULT(),
                'nilai'        => V::DEFAULT(),
            ],
            [],
        );
    }
}

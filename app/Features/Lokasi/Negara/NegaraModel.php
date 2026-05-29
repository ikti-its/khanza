<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Negara;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class NegaraModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new NegaraDatabase(),
            [
                'id_negara'    => V::DEFAULT(),
                'nama_negara'  => V::DEFAULT(),
                'kode_telepon' => V::DEFAULT(),
            ],
            [],
        );
    }
}

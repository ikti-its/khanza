<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisAirway;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefJenisAirwayModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefJenisAirwayDatabase(),
            [
                'id_jenis'   => V::DEFAULT(),
                'nama_jenis' => V::DEFAULT(),
            ],
            [],
        );
    }
}

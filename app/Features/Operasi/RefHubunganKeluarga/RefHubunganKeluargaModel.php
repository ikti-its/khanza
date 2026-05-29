<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefHubunganKeluarga;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefHubunganKeluargaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefHubunganKeluargaDatabase(),
            [
                'id_hubungan_keluarga' => V::DEFAULT(),
                'nama_hubungan'        => V::DEFAULT(),
            ],
            [],
        );
    }
}

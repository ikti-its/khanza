<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisDonorModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JenisDonorDatabase(),
            [
                'id_jenis_donor'   => V::DEFAULT(),
                'kode_jenis_donor' => V::DEFAULT(),
                'nama_jenis_donor' => V::DEFAULT(),
            ],
            [],
        );
    }
}

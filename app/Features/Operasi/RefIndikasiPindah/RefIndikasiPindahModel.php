<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefIndikasiPindahModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefIndikasiPindahDatabase(),
            [
                'id_indikasi'   => V::DEFAULT(),
                'nama_indikasi' => V::DEFAULT(),
            ],
            [],
        );
    }
}

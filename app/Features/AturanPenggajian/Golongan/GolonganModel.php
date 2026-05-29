<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Golongan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class GolonganModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new GolonganDatabase(),
            [
                'no_golongan'   => V::DEFAULT(),
                'kode_golongan' => V::DEFAULT(),
                'nama_golongan' => V::DEFAULT(),
                'gaji_pokok'    => V::DEFAULT(),
            ],
            [
                'pendidikan' => ['nama_jenjang'],
            ],
        );
    }
}

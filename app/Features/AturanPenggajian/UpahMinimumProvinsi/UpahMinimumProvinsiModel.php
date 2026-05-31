<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class UpahMinimumProvinsiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new UpahMinimumProvinsiDatabase(),
            [
                'no_ump'       => V::DEFAULT(),
                'tahun'        => V::DEFAULT(),
                'upah_minimum' => V::DEFAULT(),
            ],
            [
                'provinsi' => ['nama_provinsi'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Provinsi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ProvinsiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new ProvinsiDatabase(),
            'REFS',
            'lokasi',
            'provinsi',
            'id_provinsi',
            [
                'id_pulau'      => V::DEFAULT(),
                'id_provinsi'   => V::DEFAULT(),
                'nama_provinsi' => V::DEFAULT(),
            ],
            [],
        );
    }
}

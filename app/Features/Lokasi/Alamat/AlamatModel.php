<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Alamat;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AlamatModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new AlamatDatabase(),
            'BASE',
            'lokasi',
            'alamat',
            'id_alamat',
            [
                'id_alamat'          => V::DEFAULT(),
                'id_provinsi'        => V::DEFAULT(),
                'id_kota_lokal'      => V::DEFAULT(),
                'id_kecamatan_lokal' => V::DEFAULT(),
                'id_desa_lokal'      => V::DEFAULT(),
                'rw'                 => V::DEFAULT(),
                'rt'                 => V::DEFAULT(),
                'alamat_lengkap'     => V::DEFAULT(),
            ],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Alamat;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AlamatModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'lokasi',
            'alamat',
            'id_alamat',
            [
                'id_alamat' => V::TODO(),
                'id_provinsi' => V::TODO(),
                'id_kota_lokal' => V::TODO(),
                'id_kecamatan_lokal' => V::TODO(),
                'id_desa_lokal' => V::TODO(),
                'rw' => V::TODO(),
                'rt' => V::TODO(),
                'alamat_lengkap' => V::TODO()
            ],
            [],
        );
    }
}
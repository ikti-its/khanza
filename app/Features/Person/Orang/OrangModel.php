<?php
declare(strict_types=1);

namespace App\Features\Person\Orang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class OrangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new OrangDatabase(),
            'BASE',
            'person',
            'orang',
            'id_orang',
            [
                'id_orang'      => V::DEFAULT(),
                'nik'           => V::DEFAULT(),
                'nama'          => V::DEFAULT(),
                'tanggal_lahir' => V::DEFAULT(),
            ],
            [
                'id_jenis_kelamin'  => ['nama_jenis_kelamin'],
                'id_agama'          => ['nama_agama'],
                'id_pernikahan'     => ['status_pernikahan'],
                'id_golongan_darah' => ['nama_golongan_darah'],
                'id_alamat'         => ['rw', 'rt', 'alamat_lengkap'],
                'tempat_lahir_kota' => ['nama_kota'],
            ],
        );
    }
}

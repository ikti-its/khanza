<?php
declare(strict_types=1);

namespace App\Features\Person\Orang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class OrangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'person',
            'orang',
            'id_orang',
            [
                'id_orang' => V::TODO(),
                'nik' => V::TODO(),
                'nama' => V::TODO(),
                'id_jenis_kelamin' => V::TODO(),
                'id_agama' => V::TODO(),
                'id_pernikahan' => V::TODO(),
                'id_golongan_darah' => V::TODO(),
                'id_alamat' => V::TODO(),
                'tempat_lahir_prov' => V::TODO(),
                'tempat_lahir_kota' => V::TODO(),
                'tanggal_lahir' => V::TODO(),
            ],
        );
    }
}
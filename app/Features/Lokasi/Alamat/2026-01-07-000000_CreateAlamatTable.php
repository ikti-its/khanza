<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Alamat;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateAlamatTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'alamat',
            [
                'id_alamat'         => T::ID32(),
                'id_provinsi'       => T::INT8(),
                'id_kota_lokal'     => T::INT8(),
                'id_kecamatan_lokal'=> T::INT8(),
                'id_desa_lokal'     => T::INT16(),
                'rw'                => T::INT8(),
                'rt'                => T::INT8(),
                'alamat_lengkap'    => T::TEXT(),
            ],
            ['id_alamat'],
            [],
            [
                [['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal', 'id_desa_lokal'], 'desa', ['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal', 'id_desa_lokal'], 'CASCADE', 'CASCADE'],
            ]
        
        );
    }
}

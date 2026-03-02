<?php

namespace App\Features\Lokasi\Alamat;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
class CreateAlamatTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'alamat',
            [
                'id_alamat'         => T::ID32(),
                'id_provinsi'       => T::ID8(),
                'id_kota_lokal'     => T::ID8(),
                'id_kecamatan_lokal'=> T::ID8(),
                'id_desa_lokal'     => T::ID16(),
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

<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Alamat;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class AlamatDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'alamat',
            [
                'id_alamat'     => T::ID32(300_000_000),
                'id_provinsi'   => T::FK_AUTO(),
                'id_kota_lokal' => T::FK_AUTO(),
                'id_kec_lokal'  => T::FK_AUTO(),
                'id_desa_lokal' => T::FK_AUTO(),
                'rw'            => T::INT8(),
                'rt'            => T::INT8(),
                'alamat_lengkap'=> T::TEXT(),
            ],
            'id_alamat',
            [],
            [
                [
                    ['id_provinsi', 'id_kota_lokal', 'id_kec_lokal', 'id_desa_lokal'], 
                    \App\Features\Lokasi\Desa\DesaDatabase::class, 
                    ['id_provinsi', 'id_kota_lokal', 'id_kec_lokal', 'id_desa_lokal'],
                ],
            ],
            false,
            'alamat.csv',
        );
    }
}

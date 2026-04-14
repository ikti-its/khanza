<?php

namespace App\Features\Person\Orang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
/*
* Tabel orang digunakan untuk menyimpan data identitas individu
* yang terdaftar di dalam sistem.
*
* Data ini bersifat master dan dapat direlasikan dengan berbagai
* fitur lain seperti donor, pasien, petugas, atau pengguna sistem.
 */

class CreateOrangTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'orang',
            [
                'id_orang'           => T::ID32(),
                'nik'                => T::TEXT(),
                'nama'               => T::TEXT(),
                'id_jenis_kelamin'   => T::INT8(),
                'id_agama'           => T::INT8(),
                'id_pernikahan'      => T::INT8(),
                'id_golongan_darah'  => T::INT8(),
                'id_alamat'          => T::INT32(),
                // 'tempat_lahir_prov'  => T::INT8(),
                'tempat_lahir_kota'  => T::INT16(),
                'tanggal_lahir'      => T::DATE(),
            ],
            ['id_orang'],
            [['nik']],
            [
                [['id_jenis_kelamin'], 'jenis_kelamin', ['id_jenis_kelamin'], 'CASCADE', 'CASCADE'],
                [['id_agama'], 'agama', ['id_agama'], 'CASCADE', 'CASCADE'],
                [['id_pernikahan'], 'pernikahan', ['id_pernikahan'], 'CASCADE', 'CASCADE'],
                [['id_golongan_darah'], 'darah.golongan_darah', ['id_golongan_darah'], 'CASCADE', 'CASCADE'],
                [['id_alamat'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'CASCADE'],
                // [['tempat_lahir_prov', 'tempat_lahir_kota'], 'lokasi.kota', ['id_provinsi', 'id_kota_lokal'], 'CASCADE', 'CASCADE'],
                [['tempat_lahir_kota'], 'lokasi.kota', ['id_kota_lokal'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

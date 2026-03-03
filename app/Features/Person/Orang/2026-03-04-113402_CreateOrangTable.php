<?php

namespace App\Features\Person\Orang;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
* Tabel orang digunakan untuk menyimpan data identitas individu
* yang terdaftar di dalam sistem.
*
* Data ini bersifat master dan dapat direlasikan dengan berbagai
* fitur lain seperti donor, pasien, petugas, atau pengguna sistem.
 */

class CreateOrangTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'orang',
            [
                'id_orang'           => T::ID64(),
                'nik'                => T::TEXT(),
                'nama'               => T::TEXT(),
                'id_jenis_kelamin'   => T::ID8(),
                'id_agama'           => T::ID8(),
                'id_pernikahan'      => T::ID8(),
                'tempat_lahir_prov'  => T::ID8(),
                'tempat_lahir_kota'  => T::ID8(),
                'tanggal_lahir'      => T::DATE(),
                'id_golongandarah'   => T::INT8(),
                'id_alamat'          => T::ID32(),
                'no_telepon'         => T::TEXT(),
            ],
            ['id_orang'],
            unique_key: [['nik']],
            foreign_key: [
                [['id_jenis_kelamin'], 'jenis_kelamin', ['id_jenis_kelamin'], 'CASCADE', 'CASCADE'],
                [['id_agama'], 'agama', ['id_agama'], 'CASCADE', 'CASCADE'],
                [['id_pernikahan'], 'pernikahan', ['id_pernikahan'], 'CASCADE', 'CASCADE'],
                [['tempat_lahir_prov', 'tempat_lahir_kota'], 'lokasi.kota', ['id_provinsi', 'id_kota_lokal'], 'CASCADE', 'CASCADE'],
                [['id_golongandarah'], 'darah.golongan_darah', ['id_golongandarah'], 'CASCADE', 'CASCADE'],
                [['id_alamat'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'CASCADE'],
            ]
        );
    }
}

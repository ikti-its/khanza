<?php

namespace App\Features\Lokasi\Desa;

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
                'id_jenis_kelamin'   => T::INT8(),
                'tempat_lahir'       => T::TEXT(),
                'tanggal_lahir'      => T::DATE(),
                'id_golongandarah'   => T::INT8(),
                'id_alamat'          => T::ID64(),
                'no_telepon'         => T::TEXT(),
            ],
            ['id_orang'],
            unique_key: [['nik']],
            foreign_key: [
                [['id_jenis_kelamin'], 'jenis_kelamin', ['id_jenis_kelamin'], 'CASCADE', 'CASCADE'],
                [['id_golongandarah'], 'golongan_darah', ['id_golongandarah'], 'CASCADE', 'CASCADE'],
                [['id_alamat'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'CASCADE'],
            ]
        );
    }
}

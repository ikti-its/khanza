<?php

namespace App\Features\Lokasi\Desa;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
 *  Tabel jenis_kelamin merupakan tabel referensi (master data)
 *  yang digunakan untuk menyimpan kategori jenis kelamin.
 *  
 *  Tabel ini direlasikan ke tabel orang untuk menghindari
 *  penyimpanan teks berulang seperti "Laki-laki" atau "Perempuan".
 */

class CreateJenisKelaminTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'jenis_kelamin',
            [
                'id_jenis_kelamin'   => T::ID8(),
                'nama_jenis_kelamin' => T::TEXT(),
            ],
            ['id_jenis_kelamin'],
            unique_key: [['nama_jenis_kelamin']],
        );
    }
}

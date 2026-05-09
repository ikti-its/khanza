<?php
declare(strict_types=1);

namespace App\Features\Person\JenisKelamin;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
/*
 *  Tabel jenis_kelamin merupakan tabel referensi (master data)
 *  yang digunakan untuk menyimpan kategori jenis kelamin.
 *  
 *  Tabel ini direlasikan ke tabel orang untuk menghindari
 *  penyimpanan teks berulang seperti "Laki-laki" atau "Perempuan".
 */

final class JenisKelaminDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'person',
            'jenis_kelamin',
            [
                'id_jenis_kelamin'   => T::ID8(2),
                'nama_jenis_kelamin' => T::NAME(),
            ],
            'id_jenis_kelamin',
            ['nama_jenis_kelamin'],
            [],
            true,
            'jenis_kelamin.csv'
        );
    }
}

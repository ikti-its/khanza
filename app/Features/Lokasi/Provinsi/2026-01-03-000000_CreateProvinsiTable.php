<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Provinsi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

/*
 *  Di Indonesia, terdapat 38 provinsi
 *  Kode provinsi menggunakan 2 digit berdasarkan peraturan Kemendagri 
 *  https://peraturan.bpk.go.id/Details/196233/permendagri-no-58-tahun-2021
 *  Menurut pasal 4 ayat 3a, digit pertama menunjukkan pulau asal provinsi
 *  dan digit kedua menunjukkan nomor urut pembentukan provinsi di pulau tersebut
 *  Provinsi = 38 < 128 = ID8()
 *     
 *  Contoh provinsi Jawa Timur yang berada di pulau Jawa
 *  3  = Pulau Jawa
 *  35 = Provinsi Jawa Timur
 *  1  = Pulau Sumatera
 *  11 = Provinsi Aceh 
 */

class CreateProvinsiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'provinsi',
            [
                'id_pulau'      => T::INT8(),
                'id_provinsi'   => T::ID8(),
                'nama_provinsi' => T::TEXT(),
            ],
            ['id_provinsi'],
            [['nama_provinsi']],
            [
                [['id_pulau'], 'pulau', ['id_pulau'], 'CASCADE', 'CASCADE'],
            ]
        );
    }
}

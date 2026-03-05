<?php

namespace App\Features\Lokasi\Pulau;

use App\Core\DatabaseTemplate;
use App\Core\DBType as T;

/*
 *  Di Indonesia, 9 Kepulauan besar yang terdiri dari ribuan pulau kecil yaitu
 *  Sumatera, Jawa, Bali & Nusa Tenggara, Kalimantan, Sulawesi, Maluku, dan Papua 
 *  
 *  Kode pulau merupakan digit pertama kode provinsi berdasarkan peraturan Kemendagri 
 *  https://peraturan.bpk.go.id/Details/196233/permendagri-no-58-tahun-2021
 *  Menurut pasal 5 ayat 1, digit pertama kode wilayah menunjukkan asal pulau
 *      1 = Sumatera
 *      2 = Sumatera
 *      3 = Jawa
 *      4 = Jawa
 *      5 = Bali & Nusa Tenggara
 *      6 = Kalimantan
 *      7 = Sulawesi
 *      8 = Maluku
 *      9 = Papua
 *  Pulau = 9 < 128 = ID8()
 * 
 *  Contoh provinsi Jawa Timur yang berada di pulau Jawa
 *  3  = Pulau Jawa
 *  35 = Provinsi Jawa Timur
 */

class CreatePulauTable extends DatabaseTemplate
{   
    public function __construct(){
        parent::__construct(
            'lokasi',
            'pulau',
            [
                'id_pulau'   => T::ID8(),
                'nama_pulau' => T::TEXT(),
            ],
            ['id_pulau'],
            [['nama_pulau']],
        );
    }
}

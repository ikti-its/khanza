<?php

namespace App\Features\Lokasi\Kecamatan;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

/*  Dalam 1 kota/kabupaten terdapat 1 atau lebih kecamatan
 *  Di Indonesia, terdapat sekitar 7.000 kecamatan
 * 
 *  Kode kota/kabupaten menggunakan 6 digit berdasarkan peraturan Kemendagri 
 *  https://peraturan.bpk.go.id/Details/196233/permendagri-no-58-tahun-2021
 *  Menurut pasal 4 ayat 3c, 2 digit pertama menunjukkan pulau asal provinsi,
 *  2 digit kedua menunjukkan nomor kota/kabupaten di provinsi tersebut, dan
 *  2 digit ketiga menunjukkan nomor kecamatan di kota/kabupaten tersebut
 * 
 *  Kode kecamatan menggunakan angka 01 sampai 99
 *  Kecamatan = 99 < 128 = ID8()
 *     
 *  Contoh Kecamatan Sukolilo, Kota Surabaya, Provinsi Jawa Timur
 *  3        = Pulau Jawa
 *  35       = Provinsi Jawa Timur
 *  35.78    = Kota Surabaya
 *  35.78.09 = Kecamatan Sukolilo
 */

class CreateKecamatanTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'kecamatan',
            [
                'id_provinsi'       => T::ID8(),
                'id_kota_lokal'     => T::ID8(),
                'id_kecamatan_lokal'=> T::ID8(),
                'nama_kecamatan'    => T::TEXT(),
            ],
            ['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal'],
        );
    }
}

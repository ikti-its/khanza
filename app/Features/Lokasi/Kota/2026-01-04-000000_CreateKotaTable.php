<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Kota;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

/*  Dalam 1 provinsi terdapat 5 atau lebih kota/kabupaten
 *  Di Indonesia, terdapat 416 kabupaten dan 98 kota
 * 
 *  Kode kota/kabupaten menggunakan 4 digit berdasarkan peraturan Kemendagri 
 *  https://peraturan.bpk.go.id/Details/196233/permendagri-no-58-tahun-2021
 *  Menurut pasal 4 ayat 3b, 2 digit pertama menunjukkan pulau asal provinsi
 *  dan 2 digit kedua menunjukkan nomor kota/kabupaten di provinsi tersebut
 * 
 *  Kode kabupaten menggunakan angka 01 sampai 69
 *  Kode kota menggunakan angka 70 sampai 99
 *  Kota/kabupaten = 99 < 128 = ID8()
 *     
 *  Contoh Kota Surabaya dan Kabupaten Sidoarjo, Provinsi Jawa Timur
 *  3    = Pulau Jawa
 *  35   = Provinsi Jawa Timur
 *  3578 = Kota Surabaya
 *  3515 = Kabupaten Sidoarjo
 */

class CreateKotaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'kota',
            [
                'id_provinsi'   => T::INT8(),
                'id_kota_lokal' => T::ID16(),
                'kode_kota'     => T::TEXT(),
                'nama_kota'     => T::TEXT(),
            ],
            // ['id_provinsi', 'id_kota_lokal'],
            ['id_kota_lokal'],
            [['id_provinsi', 'kode_kota']],
            [
                [['id_provinsi'], 'provinsi', ['id_provinsi'], 'CASCADE', 'CASCADE'],
            ],
            true,
            __DIR__ . '/kota.csv',
        );
    }
}

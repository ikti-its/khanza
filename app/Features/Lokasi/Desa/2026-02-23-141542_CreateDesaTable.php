<?php

namespace App\Features\Lokasi\Desa;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;
    
/*
 *  Dalam 1 kecamatan terdapat 1 atau lebih desa
 *  Di Indonesia, terdapat sekitar 83.000 desa
 * 
 *  Kode desa menggunakan 4 digit berdasarkan peraturan Kemendagri 
 *  https://peraturan.bpk.go.id/Details/196233/permendagri-no-58-tahun-2021
 *  Menurut pasal 8 ayat 2, digit pertama menunjukkan jenis Desa
 *      1 = Kelurahan
 *      2 = Desa
 *      3 = Desa Adat
 * 
 *  Digit 2,3,4 menunjukkan nomor urut pembentukan desa dari 001 hingga 999
 *  Desa/kelurahan/desa adat = 3000 < 32768 = ID16()
 * 
 *  Contoh Kelurahan Keputih, Kecamatan Sukolilo, Kota Surabaya, Jawa Timur
 *  memiliki kode 35.78.09.1001
 *  35              = Provinsi Jawa Timur
 *  35.78           = Kota Surabaya
 *  35.78.09        = Kecamatan Sukolilo
 *  35.78.09.1001   = Kelurahan Keputih
 */

class CreateDesaTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'lokasi',
            'desa',
            [
                'id_provinsi'       => T::ID8(),
                'id_kota_lokal'     => T::ID8(),
                'id_kecamatan_lokal'=> T::ID8(),
                'id_desa_lokal'     => T::ID16(),
                'nama_kecamatan'    => T::TEXT(),
            ],
            ['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal', 'id_desa_lokal'],
            [],
            [
                [['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal'], 'kecamatan', ['id_provinsi', 'id_kota_lokal', 'id_kecamatan_lokal'], 'CASCADE', 'CASCADE'],
            ]
        
        );
    }
}

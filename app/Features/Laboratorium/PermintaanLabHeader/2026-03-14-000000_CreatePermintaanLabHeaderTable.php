<?php

namespace App\Features\Laboratorium\PermintaanLabHeader;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreatePermintaanLabHeaderTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'permintaan_lab_header',
        [
            'id_permintaan'          => T::ID64(),
            'no_permintaan'          => T::TEXT(),
            'nomor_reg'              => T::TEXT(),
            'id_kategori_lab'        => T::INT8(),
            'kode_dokter_perujuk'    => T::TEXT(),
            'tgl_permintaan'         => T::DATETIME(),
            'indikasi_klinis'        => T::TEXT(),
            'informasi_tambahan'     => T::TEXT(),
            'id_status_permintaan'   => T::INT8(),
        ],
        'id_permintaan',
        'no_permintaan',
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            ['id_kategori_lab', 'laboratorium.ref_kategori_lab', 'id_kategori'],
            // ['kode_dokter_perujuk', 'sik.dokter_structure', 'kode_dokter'],
            ['id_status_permintaan', 'laboratorium.ref_status_permintaan', 'id_status'],
        ],
        false,
        __DIR__ . '/permintaan_lab_header.csv'
    );
}
}

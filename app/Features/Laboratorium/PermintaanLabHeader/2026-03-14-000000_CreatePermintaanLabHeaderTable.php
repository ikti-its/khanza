<?php

namespace App\Features\Laboratorium\PermintaanLabHeader;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreatePermintaanLabHeaderTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'permintaan_lab_header',
        [
            'id_permintaan'          => T::ID64(),
            'no_permintaan'          => T::TEXT(),
            'nomor_reg'              => T::TEXT(),
            'id_kategori_lab'        => T::ID8(),
            'kode_dokter_perujuk'    => T::TEXT(),
            'tgl_permintaan'         => T::DATETIME(),
            'indikasi_klinis'        => T::TEXT(),
            'informasi_tambahan'     => T::TEXT(),
            'id_status_permintaan'   => T::ID8(),
        ],
        ['id_permintaan'],
        [['no_permintaan']],
        [
            // [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['id_kategori_lab'], 'laboratorium.ref_kategori_lab', ['id_kategori'], 'CASCADE', 'RESTRICT'],
            // [['kode_dokter_perujuk'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_status_permintaan'], 'laboratorium.ref_status_permintaan', ['id_status'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['tgl_permintaan'], ['id_kategori_lab']]
    );
}
}

<?php

namespace App\Features\Operasi\CatatanPaskaOperasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateCatatanPaskaOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'catatan_paska_operasi',
        [
            'id_catatan_paska'       => T::ID8(),
            'nomor_reg'              => T::TEXT(),
            'kode_dokter_bedah'      => T::TEXT(),
            'waktu_penilaian'        => T::DATETIME(),
            'instruksi_rawat'        => T::TEXT(),
            'instruksi_cairan'       => T::TEXT(),
            'instruksi_antibiotik'   => T::TEXT(),
            'instruksi_analgetik'    => T::TEXT(),
            'instruksi_medikamentosa'=> T::TEXT(),
            'instruksi_diet'         => T::TEXT(),
            'instruksi_penunjang'    => T::TEXT(),
            'instruksi_transfusi'    => T::TEXT(),
            'instruksi_lainnya'      => T::TEXT(),
        ],
        'id_catatan_paska',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['kode_dokter_bedah', 'sik.dokter_structure', 'kode_dokter'],
        ],
    );
}
}

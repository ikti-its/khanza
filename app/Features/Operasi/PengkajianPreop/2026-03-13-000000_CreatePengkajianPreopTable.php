<?php

namespace App\Features\Operasi\PengkajianPreop;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreatePengkajianPreopTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_preop',
        [
            'id_pengkajian_pre'    => T::ID8(),
            'nomor_reg'            => T::TEXT(),
            'kode_dokter_bedah'    => T::TEXT(),
            'waktu_pengkajian'     => T::DATETIME(),
            'ringkasan_klinik'     => T::TEXT(),
            'pemeriksaan_fisik'    => T::TEXT(),
            'pemeriksaan_diagnostik' => T::TEXT(),
            'diagnosa_pre_operasi' => T::TEXT(),
            'rencana_tindakan'     => T::TEXT(),
            'persiapan_khusus'     => T::TEXT(),
            'terapi_pre_operasi'   => T::TEXT(),
        ],
        ['id_pengkajian_pre'],
        [],
        [
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_bedah'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_pengkajian']]
    );
}
}

<?php

namespace App\Features\Operasi\PermintaanOperasi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreatePermintaanOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'permintaan_operasi',
        [
            'id_permintaan' => T::ID8(),
            'nomor_reg'     => T::TEXT(),
            'kode_dokter'   => T::TEXT(),
            'tanggal_minta' => T::DATETIME(),
            'is_cito'       => T::BOOL(),
        ],
        ['id_permintaan'],
        [],
        [
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['is_cito']]
    );
}
}

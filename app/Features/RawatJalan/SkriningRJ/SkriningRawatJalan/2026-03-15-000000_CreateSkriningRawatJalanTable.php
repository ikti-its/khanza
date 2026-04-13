<?php

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreateSkriningRawatJalanTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'skrining_rj',
        'skrining_rawat_jalan',
        [
            'id_skrining'    => T::ID64(),
            'no_rm'          => T::TEXT(),
            'tgl_jam_skrining'=> T::DATETIME(),
            'id_kesadaran'   => T::INT8(),
            'id_pernafasan'  => T::INT8(),
            'id_skala_nyeri' => T::INT8(),
            'id_nyeri_dada'  => T::INT8(),
            'id_batuk'       => T::INT8(),
            'is_geriatri'    => T::BOOL(),
            'is_risiko_jatuh'=> T::BOOL(),
            'id_keputusan'   => T::INT8(),
            'id_petugas'     => T::UUID(),
        ],
        ['id_skrining'],
        [],
        [
            // [['no_rm'], 'sik.pasien_structure', ['no_rkm_medis'], 'CASCADE', 'RESTRICT'],
            [['id_kesadaran'], 'skrining_rj.ref_skrining_kesadaran', ['id_kesadaran'], 'CASCADE', 'RESTRICT'],
            [['id_pernafasan'], 'skrining_rj.ref_skrining_pernafasan', ['id_pernafasan'], 'CASCADE', 'RESTRICT'],
            [['id_skala_nyeri'], 'skrining_rj.ref_skrining_skala_nyeri', ['id_skala_nyeri'], 'CASCADE', 'RESTRICT'],
            [['id_nyeri_dada'], 'skrining_rj.ref_skrining_nyeri_dada', ['id_nyeri_dada'], 'CASCADE', 'RESTRICT'],
            [['id_batuk'], 'skrining_rj.ref_skrining_batuk', ['id_batuk'], 'CASCADE', 'RESTRICT'],
            [['id_keputusan'], 'skrining_rj.ref_skrining_keputusan', ['id_keputusan'], 'CASCADE', 'RESTRICT'],
            // [['id_petugas'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
        ],
        [['no_rm'], ['tgl_jam_skrining']]
    );
}
}

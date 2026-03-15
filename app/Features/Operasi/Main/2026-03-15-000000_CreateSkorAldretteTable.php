<?php

namespace App\Features\Operasi\Main;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateSkorAldretteTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'skor_aldrette',
        [
            'id_skor_aldrette'    => T::ID8(),
            'nomor_reg'           => T::TEXT(),
            'waktu_penilaian'     => T::DATETIME(),
            'id_petugas'          => T::UUID(),
            'id_dokter_anestesi'  => T::TEXT(),
            'skor_aktivitas'      => T::INT8(),
            'skor_respirasi'      => T::INT8(),
            'skor_tekanan_darah'  => T::INT8(),
            'skor_kesadaran'      => T::INT8(),
            'skor_warna_kulit'    => T::INT8(),
            'total_skor'          => T::INT8(),
            'is_boleh_pindah'     => T::BOOL(),
            'catatan_keluar'      => T::TEXT(),
            'instruksi_rr'        => T::TEXT(),
        ],
        ['id_skor_aldrette'],
        [],
        [
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['id_petugas'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            [['id_dokter_anestesi'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['skor_aktivitas'], 'operasi.ref_aldrette_aktivitas', ['id_aktivitas'], 'CASCADE', 'RESTRICT'],
            [['skor_respirasi'], 'operasi.ref_aldrette_respirasi', ['id_respirasi'], 'CASCADE', 'RESTRICT'],
            [['skor_tekanan_darah'], 'operasi.ref_aldrette_tekanan_darah', ['id_td'], 'CASCADE', 'RESTRICT'],
            [['skor_kesadaran'], 'operasi.ref_aldrette_kesadaran', ['id_kesadaran'], 'CASCADE', 'RESTRICT'],
            [['skor_warna_kulit'], 'operasi.ref_aldrette_warna_kulit', ['id_warna'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['waktu_penilaian']]
    );
}
}

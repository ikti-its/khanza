<?php

namespace App\Features\Operasi\PengkajianPreAnestesi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreatePengkajianPreAnestesiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_pre_anestesi',
        [
            'id_pre_anestesi'     => T::ID8(),
            'nomor_reg'           => T::TEXT(),
            'kode_dokter'         => T::TEXT(),
            'waktu_pengkajian'    => T::DATETIME(),
            'diagnosa'            => T::TEXT(),
            'rencana_tindakan'    => T::TEXT(),
            'tanggal_operasi'     => T::DATE(),
            'tinggi_badan'        => T::F32(),
            'berat_badan'         => T::F32(),
            'sistolik'            => T::INT8(),
            'diastolik'           => T::INT8(),
            'saturasi_o2'         => T::INT8(),
            'nadi'                => T::INT8(),
            'suhu'                => T::F32(),
            'pernapasan'          => T::INT8(),
            'fisik_cardiovascular'=> T::TEXT(),
            'fisik_paru'          => T::TEXT(),
            'fisik_abdomen'       => T::TEXT(),
            'fisik_extrimitas'    => T::TEXT(),
            'fisik_endokrin'      => T::TEXT(),
            'fisik_ginjal'        => T::TEXT(),
            'fisik_obat_obatan'   => T::TEXT(),
            'fisik_laboratorium'  => T::TEXT(),
            'fisik_penunjang'     => T::TEXT(),
            'alergi_obat'         => T::TEXT(),
            'alergi_lainnya'      => T::TEXT(),
            'riwayat_terapi'      => T::TEXT(),
            'is_merokok'          => T::BOOL(),
            'jumlah_rokok'        => T::INT8(),
            'is_alkohol'          => T::BOOL(),
            'jumlah_alkohol'      => T::INT8(),
            'id_obat_bebas'       => T::INT8(),
            'ket_obat'            => T::TEXT(),
            'rw_cardiovascular'   => T::TEXT(),
            'rw_respiratory'      => T::TEXT(),
            'rw_endocrine'        => T::TEXT(),
            'rw_lainnya'          => T::TEXT(),
            'id_rencana_anestesi' => T::INT8(),
            'id_asa'              => T::INT8(),
            'waktu_puasa'         => T::TIME(),
            'rencana_perawatan'   => T::TEXT(),
            'catatan_khusus'      => T::TEXT(),
        ],
        'id_pre_anestesi',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['kode_dokter', 'sik.dokter_structure', 'kode_dokter'],
            ['id_obat_bebas', 'operasi.ref_obat_bebas', 'id_obat_bebas'],
            ['id_rencana_anestesi', 'operasi.ref_rencana_anestesi', 'id_rencana_anestesi'],
            ['id_asa', 'operasi.ref_angka_asa', 'id_asa'],
        ],
    );
}
}

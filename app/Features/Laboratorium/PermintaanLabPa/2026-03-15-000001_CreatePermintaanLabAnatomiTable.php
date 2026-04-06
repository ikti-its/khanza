<?php

namespace App\Features\Laboratorium\PermintaanLabPa;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreatePermintaanLabAnatomiTable extends Template
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'permintaan_lab_pa',
        [
            'id_permintaan_pa'          => T::ID32(),
            'id_permintaan_lab'         => T::ID64(),
            'tgl_pengambilan_bahan'     => T::DATETIME(),
            'metode_diperoleh'          => T::TEXT(),
            'lokasi_jaringan'           => T::TEXT(),
            'bahan_pengawet'            => T::TEXT(),
            'riwayat_lokasi_lab'        => T::TEXT(),
            'riwayat_tgl_sebelumnya'    => T::DATE(),
            'riwayat_no_pa_sebelumnya'  => T::TEXT(),
            'riwayat_diagnosa_sebelumnya' => T::TEXT(),
            'id_item_pemeriksaan'       => T::ID32(),
        ],
        ['id_permintaan_pa'],
        [],
        [
            [['id_permintaan_lab'], 'laboratorium.permintaan_lab_header', ['id_permintaan'], 'CASCADE', 'CASCADE'],
            [['id_item_pemeriksaan'], 'laboratorium.ref_item_pemeriksaan_lab', ['id_item_lab'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_permintaan_lab']]
    );
}
}

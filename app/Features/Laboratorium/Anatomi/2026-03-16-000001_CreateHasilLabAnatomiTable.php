<?php

namespace App\Features\Laboratorium\Anatomi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateHasilLabAnatomiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'hasil_lab_pa',
        [
            'id_hasil_pa'         => T::ID64(),
            'id_permintaan_lab'   => T::ID64(),
            'nomor_reg'           => T::TEXT(),
            'kode_dokter_pj'      => T::TEXT(),
            'id_petugas_lab'      => T::UUID(),
            'kode_dokter_perujuk' => T::TEXT(),
            'tgl_jam_hasil'       => T::DATETIME(),
            'id_item_pemeriksaan' => T::ID32(),
            'diagnosa_klinis'     => T::TEXT(),
            'makroskopik'         => T::TEXT(),
            'mikroskopik'         => T::TEXT(),
            'kesimpulan'          => T::TEXT(),
            'kesan'               => T::TEXT()->nullable(),
        ],
        ['id_hasil_pa'],
        [],
        [
            [['id_permintaan_lab'], 'laboratorium.permintaan_lab_header', ['id_permintaan'], 'CASCADE', 'RESTRICT'],
            [['nomor_reg'], 'sik.registrasi_structure', ['nomor_reg'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_pj'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_petugas_lab'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'RESTRICT'],
            [['kode_dokter_perujuk'], 'sik.dokter_structure', ['kode_dokter'], 'CASCADE', 'RESTRICT'],
            [['id_item_pemeriksaan'], 'laboratorium.permintaan_lab_pa', ['id_permintaan_pa'], 'CASCADE', 'RESTRICT'],
        ],
        [['nomor_reg'], ['tgl_jam_hasil']]
    );
}
}

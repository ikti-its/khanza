<?php

namespace App\Features\Laboratorium\HasilLabMb;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateHasilLabMikrobiologiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'hasil_lab_mb',
        [
            'id_hasil_mb'               => T::ID64(),
            'id_permintaan_lab'         => T::INT64(),
            'nomor_reg'                 => T::TEXT(),
            'kode_dokter_pj'            => T::TEXT(),
            'id_petugas_lab'            => T::UUID(),
            'kode_dokter_perujuk'       => T::TEXT(),
            'tgl_jam_hasil'             => T::DATETIME(),
            'id_item_pemeriksaan'       => T::INT32(),
            'id_parameter_pemeriksaan'  => T::INT32(),
            'nilai_hasil'               => T::TEXT(),
            'keterangan_hasil'          => T::TEXT(),
        ],
        'id_hasil_mb',
        [],
        [
            ['id_permintaan_lab', 'laboratorium.permintaan_lab_header', 'id_permintaan'],
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['kode_dokter_pj', 'sik.dokter_structure', 'kode_dokter'],
            // ['id_petugas_lab', 'sik.pegawai_structure', 'id'],
            // ['kode_dokter_perujuk', 'sik.dokter_structure', 'kode_dokter'],
            ['id_item_pemeriksaan', 'laboratorium.permintaan_lab_mb', 'id_permintaan_mb'],
            ['id_parameter_pemeriksaan', 'laboratorium.permintaan_lab_mb', 'id_permintaan_mb'],
        ],
    );
}
}

<?php

namespace App\Features\Operasi\ChecklistPreOperasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class CreateChecklistPreOperasiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_pre_operasi',
        [
            'id_checklist'           => T::ID8(),
            'nomor_reg'              => T::TEXT(),
            'waktu_checklist'        => T::DATETIME(),
            'sn_cn'                  => T::TEXT(),
            'kode_dokter_bedah'      => T::TEXT(),
            'kode_dokter_anestesi'   => T::TEXT(),
            'tindakan'               => T::TEXT(),
            'is_identitas_sesuai'    => T::BOOL(),
            'id_keadaan_umum'        => T::INT8(),
            'id_penandaan_area'      => T::INT8(),
            'is_ijin_bedah'          => T::BOOL(),
            'is_ijin_anestesi'       => T::BOOL(),
            'id_ijin_transfusi'      => T::INT8(),
            'id_persiapan_darah'     => T::INT8(),
            'ket_persiapan_darah'    => T::TEXT(),
            'id_perlengkapan_khusus' => T::INT8(),
            'id_petugas_ruangan'     => T::UUID(),
            'id_petugas_ok'          => T::UUID(),
        ],
        'id_checklist',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            // ['kode_dokter_bedah', 'sik.dokter_structure', 'kode_dokter'],
            // ['kode_dokter_anestesi', 'sik.dokter_structure', 'kode_dokter'],
            ['id_keadaan_umum', 'operasi.ref_keadaan_umum', 'id_keadaan_umum'],
            ['id_penandaan_area', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
            ['id_ijin_transfusi', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
            ['id_persiapan_darah', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
            ['id_perlengkapan_khusus', 'operasi.ref_ketersediaan_status', 'id_ketersediaan_status'],
            // ['id_petugas_ruangan', 'sik.pegawai_structure', 'id'],
            // ['id_petugas_ok', 'sik.pegawai_structure', 'id'],
        ],
    );
}
}

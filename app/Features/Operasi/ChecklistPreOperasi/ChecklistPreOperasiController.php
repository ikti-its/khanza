<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class ChecklistPreOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPreOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Pre Operasi', 'icon' => 'checklist_pre_operasi'],
            ],
            judul: 'Checklist Pre Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Checklist',           'id_checklist',           I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',              I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Checklist',         'waktu_checklist',        I::DATE, REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                  I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',      I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',               I::TEXT,    REQUIRED],
                [SHOW, 'Identitas Sesuai',        'is_identitas_sesuai',    I::SELECT,  REQUIRED],
                [SHOW, 'Keadaan Umum',            'id_keadaan_umum',        I::INDEX,  REQUIRED],
                [SHOW, 'Penandaan Area',          'id_penandaan_area',      I::INDEX,  REQUIRED],
                [SHOW, 'Ijin Bedah',              'is_ijin_bedah',          I::SELECT,  REQUIRED],
                [SHOW, 'Ijin Anestesi',           'is_ijin_anestesi',       I::SELECT,  REQUIRED],
                [SHOW, 'Ijin Transfusi',          'id_ijin_transfusi',      I::INDEX,  REQUIRED],
                [SHOW, 'Persiapan Darah',         'id_persiapan_darah',     I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Persiapan Darah','ket_persiapan_darah',  I::TEXT,    REQUIRED],
                [SHOW, 'Perlengkapan Khusus',     'id_perlengkapan_khusus', I::INDEX,  REQUIRED],
                [SHOW, 'ID Petugas Ruangan',      'id_petugas_ruangan',     I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas OK',           'id_petugas_ok',          I::TEXT,    REQUIRED],
            ],
        );
    }
}
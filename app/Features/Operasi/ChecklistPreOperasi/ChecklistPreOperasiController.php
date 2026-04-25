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
                [HIDE, 'ID Checklist',           'id_checklist',           'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',              'teks',    REQUIRED],
                [SHOW, 'Waktu Checklist',         'waktu_checklist',        'tanggal', REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                  'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',      'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   'teks',    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',               'teks',    REQUIRED],
                [SHOW, 'Identitas Sesuai',        'is_identitas_sesuai',    'status',  REQUIRED],
                [SHOW, 'Keadaan Umum',            'id_keadaan_umum',        'indeks',  REQUIRED],
                [SHOW, 'Penandaan Area',          'id_penandaan_area',      'indeks',  REQUIRED],
                [SHOW, 'Ijin Bedah',              'is_ijin_bedah',          'status',  REQUIRED],
                [SHOW, 'Ijin Anestesi',           'is_ijin_anestesi',       'status',  REQUIRED],
                [SHOW, 'Ijin Transfusi',          'id_ijin_transfusi',      'indeks',  REQUIRED],
                [SHOW, 'Persiapan Darah',         'id_persiapan_darah',     'indeks',  REQUIRED],
                [SHOW, 'Keterangan Persiapan Darah','ket_persiapan_darah',  'teks',    REQUIRED],
                [SHOW, 'Perlengkapan Khusus',     'id_perlengkapan_khusus', 'indeks',  REQUIRED],
                [SHOW, 'ID Petugas Ruangan',      'id_petugas_ruangan',     'teks',    REQUIRED],
                [SHOW, 'ID Petugas OK',           'id_petugas_ok',          'teks',    REQUIRED],
            ],
        );
    }
}
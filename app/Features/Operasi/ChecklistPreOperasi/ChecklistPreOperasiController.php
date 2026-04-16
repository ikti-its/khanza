<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasi;
use App\Core\Controller\ControllerTemplate;

class ChecklistPreOperasiController extends ControllerTemplate
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
                [0, 'ID Checklist',           'id_checklist',           'indeks',  0],
                [1, 'Nomor Registrasi',        'nomor_reg',              'teks',    1],
                [1, 'Waktu Checklist',         'waktu_checklist',        'tanggal', 1],
                [1, 'SN/CN',                   'sn_cn',                  'teks',    1],
                [1, 'Kode Dokter Bedah',       'kode_dokter_bedah',      'teks',    1],
                [1, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   'teks',    1],
                [1, 'Tindakan',                'tindakan',               'teks',    1],
                [1, 'Identitas Sesuai',        'is_identitas_sesuai',    'status',  1],
                [1, 'Keadaan Umum',            'id_keadaan_umum',        'indeks',  1],
                [1, 'Penandaan Area',          'id_penandaan_area',      'indeks',  1],
                [1, 'Ijin Bedah',              'is_ijin_bedah',          'status',  1],
                [1, 'Ijin Anestesi',           'is_ijin_anestesi',       'status',  1],
                [1, 'Ijin Transfusi',          'id_ijin_transfusi',      'indeks',  1],
                [1, 'Persiapan Darah',         'id_persiapan_darah',     'indeks',  1],
                [1, 'Keterangan Persiapan Darah','ket_persiapan_darah',  'teks',    1],
                [1, 'Perlengkapan Khusus',     'id_perlengkapan_khusus', 'indeks',  1],
                [1, 'ID Petugas Ruangan',      'id_petugas_ruangan',     'teks',    1],
                [1, 'ID Petugas OK',           'id_petugas_ok',          'teks',    1],
            ],
        );
    }
}
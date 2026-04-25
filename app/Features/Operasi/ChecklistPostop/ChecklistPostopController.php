<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostop;
use App\Core\Controller\ControllerTemplate;

final class ChecklistPostopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPostopModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Post Operasi', 'icon' => 'checklist_postop'],
            ],
            judul: 'Checklist Post Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Checklist Post',      'id_checklist_post',    'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',            'teks',    REQUIRED],
                [SHOW, 'Waktu Checklist',         'waktu_checklist',      'tanggal', REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',    'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi', 'teks',    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',             'teks',    REQUIRED],
                [SHOW, 'Kesadaran Pasca Op',      'id_kesadaran_pascaop', 'indeks',  REQUIRED],
                [SHOW, 'Jenis Cairan Infus',      'jenis_cairan_infus',   'teks',    REQUIRED],
                [SHOW, 'Jaringan PA/VC',          'id_jaringan_pa_vc',    'indeks',  REQUIRED],
                [SHOW, 'Kateter Urine',           'id_kateter_urine',     'indeks',  REQUIRED],
                [SHOW, 'Waktu Pasang Kateter',    'waktu_pasang_kateter', 'jam',     REQUIRED],
                [SHOW, 'Warna Urine',             'id_warna_urine',       'indeks',  REQUIRED],
                [SHOW, 'Jumlah Urine (cc)',       'jumlah_urine_cc',      'jumlah',  REQUIRED],
                [SHOW, 'Catatan Luka Operasi',    'catatan_luka_operasi', 'teks',    REQUIRED],
                [SHOW, 'ID Petugas Anestesi',     'id_petugas_anestesi',  'teks',    REQUIRED],
                [SHOW, 'ID Petugas OK',           'id_petugas_ok',        'teks',    REQUIRED],
            ],
        );
    }
}
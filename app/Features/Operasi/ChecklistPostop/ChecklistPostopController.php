<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostop;
use App\Core\Controller\ControllerTemplate;

class ChecklistPostopController extends ControllerTemplate
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
                [0, 'ID Checklist Post',      'id_checklist_post',    'indeks',  0],
                [1, 'Nomor Registrasi',        'nomor_reg',            'teks',    1],
                [1, 'Waktu Checklist',         'waktu_checklist',      'tanggal', 1],
                [1, 'SN/CN',                   'sn_cn',                'teks',    1],
                [1, 'Kode Dokter Bedah',       'kode_dokter_bedah',    'teks',    1],
                [1, 'Kode Dokter Anestesi',    'kode_dokter_anestesi', 'teks',    1],
                [1, 'Tindakan',                'tindakan',             'teks',    1],
                [1, 'Kesadaran Pasca Op',      'id_kesadaran_pascaop', 'indeks',  1],
                [1, 'Jenis Cairan Infus',      'jenis_cairan_infus',   'teks',    1],
                [1, 'Jaringan PA/VC',          'id_jaringan_pa_vc',    'indeks',  1],
                [1, 'Kateter Urine',           'id_kateter_urine',     'indeks',  1],
                [1, 'Waktu Pasang Kateter',    'waktu_pasang_kateter', 'jam',     1],
                [1, 'Warna Urine',             'id_warna_urine',       'indeks',  1],
                [1, 'Jumlah Urine (cc)',       'jumlah_urine_cc',      'jumlah',  1],
                [1, 'Catatan Luka Operasi',    'catatan_luka_operasi', 'teks',    1],
                [1, 'ID Petugas Anestesi',     'id_petugas_anestesi',  'teks',    1],
                [1, 'ID Petugas OK',           'id_petugas_ok',        'teks',    1],
            ],
        );
    }
}
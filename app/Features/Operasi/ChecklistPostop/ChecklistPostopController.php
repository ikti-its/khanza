<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostop;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Checklist Post',      'id_checklist_post',    I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',            I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Checklist',         'waktu_checklist',      I::DATE, REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',    I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi', I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',             I::TEXT,    REQUIRED],
                [SHOW, 'Kesadaran Pasca Op',      'id_kesadaran_pascaop', I::INDEX,  REQUIRED],
                [SHOW, 'Jenis Cairan Infus',      'jenis_cairan_infus',   I::TEXT,    REQUIRED],
                [SHOW, 'Jaringan PA/VC',          'id_jaringan_pa_vc',    I::INDEX,  REQUIRED],
                [SHOW, 'Kateter Urine',           'id_kateter_urine',     I::INDEX,  REQUIRED],
                [SHOW, 'Waktu Pasang Kateter',    'waktu_pasang_kateter', I::TIME,     REQUIRED],
                [SHOW, 'Warna Urine',             'id_warna_urine',       I::INDEX,  REQUIRED],
                [SHOW, 'Jumlah Urine (cc)',       'jumlah_urine_cc',      I::NUMBER,  REQUIRED],
                [SHOW, 'Catatan Luka Operasi',    'catatan_luka_operasi', I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas Anestesi',     'id_petugas_anestesi',  I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas OK',           'id_petugas_ok',        I::TEXT,    REQUIRED],
            ],
        );
    }
}
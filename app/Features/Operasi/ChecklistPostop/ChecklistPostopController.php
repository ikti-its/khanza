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
            title: 'Checklist Post Operasi',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_checklist_post', 'ID Checklist Post'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_checklist', 'Waktu Checklist'],
                [SHOW, REQUIRED, I::TEXT, 'sn_cn', 'SN/CN'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_anestesi', 'Kode Dokter Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'tindakan', 'Tindakan'],
                [SHOW, REQUIRED, I::INDEX, 'id_kesadaran_pascaop', 'Kesadaran Pasca Op'],
                [SHOW, REQUIRED, I::TEXT, 'jenis_cairan_infus', 'Jenis Cairan Infus'],
                [SHOW, REQUIRED, I::INDEX, 'id_jaringan_pa_vc', 'Jaringan PA/VC'],
                [SHOW, REQUIRED, I::INDEX, 'id_kateter_urine', 'Kateter Urine'],
                [SHOW, REQUIRED, I::TIME, 'waktu_pasang_kateter', 'Waktu Pasang Kateter'],
                [SHOW, REQUIRED, I::INDEX, 'id_warna_urine', 'Warna Urine'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah_urine_cc', 'Jumlah Urine (cc)'],
                [SHOW, REQUIRED, I::TEXT, 'catatan_luka_operasi', 'Catatan Luka Operasi'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_anestesi', 'ID Petugas Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_ok', 'ID Petugas OK'],
            ],
        );
    }
}
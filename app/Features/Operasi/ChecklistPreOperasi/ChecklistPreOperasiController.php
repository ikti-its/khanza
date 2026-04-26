<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class ChecklistPreOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPreOperasiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Checklist Pre Operasi', 'checklist_pre_operasi'],
            ],
            title: 'Checklist Pre Operasi',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_checklist', 'ID Checklist'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_checklist', 'Waktu Checklist'],
                [SHOW, REQUIRED, I::TEXT, 'sn_cn', 'SN/CN'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_anestesi', 'Kode Dokter Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'tindakan', 'Tindakan'],
                [SHOW, REQUIRED, I::SELECT, 'is_identitas_sesuai', 'Identitas Sesuai'],
                [SHOW, REQUIRED, I::INDEX, 'id_keadaan_umum', 'Keadaan Umum'],
                [SHOW, REQUIRED, I::INDEX, 'id_penandaan_area', 'Penandaan Area'],
                [SHOW, REQUIRED, I::SELECT, 'is_ijin_bedah', 'Ijin Bedah'],
                [SHOW, REQUIRED, I::SELECT, 'is_ijin_anestesi', 'Ijin Anestesi'],
                [SHOW, REQUIRED, I::INDEX, 'id_ijin_transfusi', 'Ijin Transfusi'],
                [SHOW, REQUIRED, I::INDEX, 'id_persiapan_darah', 'Persiapan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'ket_persiapan_darah', 'Keterangan Persiapan Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_perlengkapan_khusus', 'Perlengkapan Khusus'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_ruangan', 'ID Petugas Ruangan'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_ok', 'ID Petugas OK'],
            ],
        );
    }
}
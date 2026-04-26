<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreop;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengkajianPreopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreopModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Pengkajian Pre-Operasi', 'pengkajian_pre_op'],
            ],
            title: 'Pengkajian Pre-Operasi',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengkajian', 'ID Pengkajian'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TIME, 'waktu_pengkajian', 'Waktu Pengkajian'],
                [SHOW, REQUIRED, I::TEXT, 'ringkasan_klinik', 'Ringkasan Klinik'],
                [SHOW, REQUIRED, I::TEXT, 'pemeriksaan_fisik', 'Pemeriksaan Fisik'],
                [SHOW, REQUIRED, I::TEXT, 'pemeriksaan_diagnostik', 'Pemeriksaan Diagnostik'],
                [SHOW, REQUIRED, I::TEXT, 'diagnosa_pre_operasi', 'Diagnosa Pre-Operasi'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_tindakan', 'Rencana Tindakan'],
                [SHOW, REQUIRED, I::TEXT, 'persiapan_khusus', 'Persiapan Khusus'],
                [SHOW, REQUIRED, I::TEXT, 'terapi_pre_operasi', 'Terapi Pre-Operasi'],
            ],
        );
    }
}
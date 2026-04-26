<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilRadModel(),
            breadcrumbs: [
                ['Radiologi', 'radiologi'],
                ['Hasil Radiologi', 'hasil_rad'],
            ],
            title: 'Hasil Radiologi',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil_rad', 'ID Hasil Radiologi'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_rad', 'ID Permintaan Rad'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_pj', 'Kode Dokter PJ'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_rad', 'ID Petugas Rad'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_perujuk', 'Kode Dokter Perujuk'],
                [SHOW, REQUIRED, I::DATE, 'tgl_jam_hasil', 'Tanggal & Jam Hasil'],
                [SHOW, REQUIRED, I::TEXT, 'catatan', 'Catatan'],
            ],
        );
    }
}
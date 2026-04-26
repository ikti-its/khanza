<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SkorBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkorBromageModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Skor Bromage', 'skor_bromage'],
            ],
            title: 'Skor Bromage',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skor_bromage', 'ID Skor Bromage'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_penilaian', 'Waktu Penilaian'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::TEXT, 'id_dokter_anestesi', 'Dokter Anestesi'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_bromage', 'Skor Bromage'],
                [SHOW, REQUIRED, I::SELECT, 'is_boleh_pindah', 'Boleh Pindah'],
                [SHOW, REQUIRED, I::TEXT, 'catatan_keluar', 'Catatan Keluar'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_rr', 'Instruksi RR'],
            ],
        );
    }
}
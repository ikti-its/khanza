<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PermintaanOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanOperasiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Permintaan Operasi', 'permintaan_operasi'],
            ],
            title: 'Permintaan Operasi',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter', 'Kode Dokter'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_minta', 'Tanggal Minta'],
                [SHOW, REQUIRED, I::SELECT, 'is_cito', 'CITO'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasienPeralatan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenyerahanPasienPeralatanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PenyerahanPasienPeralatanModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Penyerahan Pasien Peralatan', 'penyerahan_pasien_peralatan'],
            ],
            title: 'Penyerahan Pasien Peralatan',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id', 'ID'],
                [HIDE, OPTIONAL, I::INDEX, 'id_penyerahan', 'ID Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_peralatan', 'Peralatan'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }
}
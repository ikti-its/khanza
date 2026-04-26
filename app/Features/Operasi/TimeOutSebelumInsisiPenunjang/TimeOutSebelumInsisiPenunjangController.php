<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TimeOutSebelumInsisiPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new TimeOutSebelumInsisiPenunjangModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Time Out Sebelum Insisi Penunjang', 'time_out_sebelum_insisi_penunjang'],
            ],
            title: 'Time Out Sebelum Insisi Penunjang',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_penunjang', 'ID Penunjang'],
                [HIDE, OPTIONAL, I::INDEX, 'id_timeout', 'ID Time Out'],
                [SHOW, REQUIRED, I::TEXT, 'jenis_penunjang', 'Jenis Penunjang'],
                [SHOW, REQUIRED, I::INDEX,'id_status', 'Status'],
            ],
        );
    }
}
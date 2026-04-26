<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class ChecklistPostopPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPostopPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Post Operasi Penunjang', 'icon' => 'checklist_postop_penunjang'],
            ],
            title: 'Checklist Post Operasi Penunjang',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_penunjang', 'ID Penunjang'],
                [HIDE, OPTIONAL, I::INDEX, 'id_checklist_post', 'ID Checklist Post'],
                [SHOW, REQUIRED, I::TEXT, 'jenis_penunjang', 'Jenis Penunjang'],
                [SHOW, REQUIRED, I::INDEX, 'id_ketersediaan', 'Ketersediaan'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRencanaAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefRencanaAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefRencanaAnestesiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Rencana Anestesi', 'ref_rencana_anestesi'],
            ],
            title: 'Referensi Rencana Anestesi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_rencana_anestesi', 'ID Rencana Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_rencana', 'Nama Rencana'],
            ],
        );
    }
}
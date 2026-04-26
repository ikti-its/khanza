<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStatusPenayanganController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusPenayanganModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Status Penayangan', 'ref_status_penayangan'],
            ],
            title: 'Referensi Status Penayangan',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_penayangan', 'ID Status Penayangan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}
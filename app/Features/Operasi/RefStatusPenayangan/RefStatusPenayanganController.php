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
            new RefStatusPenayanganModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Status Penayangan', 'ref_status_penayangan'],
            ],
            'Referensi Status Penayangan',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_penayangan', 'ID Status Penayangan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}
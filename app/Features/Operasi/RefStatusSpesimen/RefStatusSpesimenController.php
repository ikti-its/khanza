<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStatusSpesimenController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusSpesimenModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Status Spesimen', 'ref_status_spesimen'],
            ],
            title: 'Referensi Status Spesimen',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_spesimen', 'ID Status Spesimen'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}
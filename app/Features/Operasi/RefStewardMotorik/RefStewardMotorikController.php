<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStewardMotorikController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardMotorikModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Steward Motorik', 'ref_steward_motorik'],
            ],
            title: 'Referensi Steward Motorik',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_motorik', 'ID Motorik'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}
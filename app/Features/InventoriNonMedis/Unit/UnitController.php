<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class UnitController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new UnitModel(),
            breadcrumbs: [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Unit',                'unit'],
            ],
            title: 'Unit',
            action: [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_unit', 'ID'],
                [SHOW, REQUIRED, I::NAME, 'nama_unit', 'Nama Unit'],
            ],
        );
    }
}

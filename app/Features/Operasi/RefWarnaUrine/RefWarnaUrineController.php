<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefWarnaUrine;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefWarnaUrineController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefWarnaUrineModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Warna Urine', 'ref_warna_urine'],
            ],
            title: 'Referensi Warna Urine',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_warna_urine', 'ID Warna Urine'],
                [SHOW, REQUIRED, I::TEXT, 'nama_warna', 'Nama Warna'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefPremedikasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefPremedikasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Premedikasi', 'icon' => 'ref_premedikasi'],
            ],
            title: 'Referensi Premedikasi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_premedikasi', 'ID Premedikasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_premedikasi', 'Nama Premedikasi'],
            ],
        );
    }
}
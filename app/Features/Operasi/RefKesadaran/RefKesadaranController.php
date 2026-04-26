<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKesadaranModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Kesadaran', 'ref_kesadaran'],
            ],
            'Referensi Kesadaran',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kesadaran', 'Nama Kesadaran'],
            ],
        );
    }
}
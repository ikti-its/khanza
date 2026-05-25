<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKesadaranPascaopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKesadaranPascaopModel(),
            [
                ['Operasi',                           'operasi'],
                ['Referensi Kesadaran Pasca Operasi', 'ref_kesadaran_pascaop'],
            ],
            'Referensi Kesadaran Pasca Operasi',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran',   'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT,  'nama_kesadaran', 'Nama Kesadaran'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefSkriningKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKesadaranModel(),
            breadcrumbs: [
                ['Rawat Jalan', 'rawat_jalan'],
                ['Referensi Skrining Kesadaran', 'ref_skrining_kesadaran'],
            ],
            title: 'Referensi Skrining Kesadaran',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'kesadaran', 'Kesadaran'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefSkriningSkalaNyeriController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningSkalaNyeriModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Skala Nyeri', 'icon' => 'ref_skrining_skala_nyeri'],
            ],
            title: 'Referensi Skrining Skala Nyeri',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skala_nyeri', 'ID Skala Nyeri'],
                [SHOW, REQUIRED, I::TEXT, 'skala_nyeri', 'Skala Nyeri'],
            ],
        );
    }
}
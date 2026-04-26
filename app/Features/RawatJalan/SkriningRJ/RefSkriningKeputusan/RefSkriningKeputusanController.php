<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefSkriningKeputusanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKeputusanModel(),
            breadcrumbs: [
                ['Rawat Jalan', 'rawat_jalan'],
                ['Referensi Skrining Keputusan', 'ref_skrining_keputusan'],
            ],
            title: 'Referensi Skrining Keputusan',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_keputusan', 'ID Keputusan'],
                [SHOW, REQUIRED, I::TEXT, 'skrining_keputusan', 'Skrining Keputusan'],
            ],
        );
    }
}
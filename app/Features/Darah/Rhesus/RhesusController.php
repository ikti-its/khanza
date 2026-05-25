<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RhesusController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RhesusModel(),
            [
                ['Darah', 'darah'],
                ['Rhesus', 'rhesus'],
            ],
            'Rhesus',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_rhesus',   'ID Rhesus'],
                [SHOW, REQUIRED, I::TEXT,  'kode_rhesus', 'Kode Rhesus'],
            ],
        );
    }
}

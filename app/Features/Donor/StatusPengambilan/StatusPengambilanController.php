<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPengambilan;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusPengambilanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new StatusPengambilanModel(),
            [
                ['Donor',              'donor'],
                ['Status Pengambilan', 'status_pengambilan'],
            ],
            'Status Pengambilan',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pengambilan',   'ID Status Pengambilan'],
                [SHOW, REQUIRED, I::TEXT,  'nama_status_pengambilan', 'Nama Status Pengambilan'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\TunjanganHariRaya;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TunjanganHariRayaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TunjanganHariRayaModel(),
            [
                ['User', 'user'],
                ['THR', 'thr'],
            ],
            'THR',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX,  'no_thr',       'Nomor THR'],
                [SHOW, REQUIRED, I::NUMBER, 'masa_kerja',   'Masa Kerja (bulan)'],
                [SHOW, REQUIRED, I::FLOAT,  'pengali_upah', 'Pengali Upah'],
            ],
        );
    }
}

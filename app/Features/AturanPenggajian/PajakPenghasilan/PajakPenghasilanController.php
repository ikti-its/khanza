<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PajakPenghasilan;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PajakPenghasilanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PajakPenghasilanModel(),
            [
                ['User', 'user'],
                ['PPH21', 'pph21'],
            ],
            'PPH21',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX, 'no_pph21',    'Nomor Pajak'],
                [SHOW, REQUIRED, I::MONEY, 'pkp_bawah',   'Batas Bawah PKP'],
                [SHOW, REQUIRED, I::MONEY, 'pkp_atas',    'Batas Atas PKP'],
                [SHOW, REQUIRED, I::FLOAT, 'tarif_pajak', 'Tarif Pajak (%)'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenghasilanTidakKenaPajakController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenghasilanTidakKenaPajakModel(),
            [
                ['User', 'user'],
                ['PTKP', 'ptkp'],
            ],
            'PTKP',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX,  'no_ptkp',    'Nomor PTKP'],
                [SHOW, REQUIRED, I::TEXT,   'kode_ptkp',  'Kode PTKP'],
                [SHOW, REQUIRED, I::TEXT,   'perkawinan', 'Perkawinan'],
                [SHOW, REQUIRED, I::NUMBER, 'tanggungan', 'Tanggungan'],
                [SHOW, REQUIRED, I::MONEY,  'nilai_ptkp', 'Nilai PTKP'],
            ],
        );
    }
}

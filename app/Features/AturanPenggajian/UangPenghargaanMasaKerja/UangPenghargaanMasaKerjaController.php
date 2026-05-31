<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UangPenghargaanMasaKerja;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class UangPenghargaanMasaKerjaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new UpahPenghargaanMasaKerjaModel(),
            [
                ['User', 'user'],
                ['UPMK', 'upmk'],
            ],
            'UPMK',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX,  'no_upmk',      'Nomor UPMK'],
                [SHOW, REQUIRED, I::NUMBER, 'masa_kerja',   'Masa Kerja (tahun)'],
                [SHOW, REQUIRED, I::TEXT,   'pengali_upah', 'Pengali Upah'],
            ],
        );
    }
}

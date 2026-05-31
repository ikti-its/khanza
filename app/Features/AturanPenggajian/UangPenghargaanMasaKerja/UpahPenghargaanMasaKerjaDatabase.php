<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UangPenghargaanMasaKerja;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class UpahPenghargaanMasaKerjaDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'penggajian',
            'upmk',
            [
                'no_upmk'      => T::ID(30),
                'masa_kerja'   => T::QTY(0, 30),
                'pengali_upah' => T::MULT(),
            ],
            'no_upmk',
            [
                'masa_kerja',
            ],
            [],
            true,
            'upmk.csv',
        );
    }
}

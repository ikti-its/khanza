<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\TunjanganHariRaya;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TunjanganHariRayaDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'thr',
            [
                'no_thr'       => T::ID(12),
                'masa_kerja'   => T::QTY(1, 12),
                'pengali_upah' => T::MULT(),
            ],
            'no_thr',
            [
                'masa_kerja',
            ],
            [],
        );
    }
}

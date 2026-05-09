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
                'no_thr'       => T::ID8(12),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            'no_thr',
            [
                'masa_kerja',
            ],
            [],
        );
    }
}

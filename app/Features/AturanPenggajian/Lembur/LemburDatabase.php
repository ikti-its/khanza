<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Lembur;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class LemburDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'penggajian',
            'lembur',
            [
                'no_lembur'    => T::ID(20),
                'jenis_lembur' => T::TEXT(),
                'jam_lembur'   => T::QTY(0, 12),
                'pengali_upah' => T::MULT(),
            ],
            'no_lembur',
            [
                ['jenis_lembur', 'jam_lembur'],
            ],
            [],
            true,
            'lembur.csv',
        );
    }
}

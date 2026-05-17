<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Pesangon;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PesangonDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pesangon',
            [
                'no_pesangon'  => T::ID(30),
                'masa_kerja'   => T::QTY(0, 30),
                'pengali_upah' => T::MULT(),
            ],
            'no_pesangon',
            [
                'masa_kerja'
            ],
            [],
        );
    }
}

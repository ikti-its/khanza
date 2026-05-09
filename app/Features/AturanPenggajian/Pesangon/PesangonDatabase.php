<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Pesangon;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PesangonDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pesangon',
            [
                'no_pesangon'  => T::ID8(30),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            'no_pesangon',
            [
                'masa_kerja'
            ],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Pesangon;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePesangonTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pesangon',
            [
                'no_pesangon'  => T::ID8(),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_pesangon'],
            [],
            [],
            [],
        );
    }
}

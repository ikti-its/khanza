<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UangPenghargaanMasaKerja;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateUangPenghargaanMasaKerjaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upmk',
            [
                'no_upmk'      => T::ID8(),
                'masa_kerja'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_upmk'],
            [],
            [],
            [],
        );
    }
}

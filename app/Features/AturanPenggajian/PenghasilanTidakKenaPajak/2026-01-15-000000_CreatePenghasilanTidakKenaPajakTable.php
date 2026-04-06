<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePenghasilanTidakKenaPajakTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'ptkp',
            [
                'no_ptkp'    => T::ID8(),
                'kode_ptkp'  => T::TEXT(),
                'perkawinan' => T::TEXT(),
                'tanggungan' => T::INT8(),
                'nilai_ptkp' => T::ID32(),
            ],
            ['no_ptkp'],
            [],
            [],
            [],
        );
    }
}

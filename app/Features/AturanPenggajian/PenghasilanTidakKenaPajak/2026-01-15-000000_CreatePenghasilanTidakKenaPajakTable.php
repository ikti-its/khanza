<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePenghasilanTidakKenaPajakTable extends DatabaseTemplate
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

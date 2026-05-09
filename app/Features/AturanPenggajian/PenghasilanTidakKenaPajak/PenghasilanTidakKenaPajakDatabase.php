<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PenghasilanTidakKenaPajakDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'ptkp',
            [
                'no_ptkp'    => T::ID8(20),
                'kode_ptkp'  => T::TEXT(),
                'perkawinan' => T::TEXT(),
                'tanggungan' => T::INT8(),
                'nilai_ptkp' => T::INT32(),
            ],
            'no_ptkp',
            [
                'kode_ptkp',
                ['perkawinan', 'tanggungan'],
            ],
            [],
        );
    }
}

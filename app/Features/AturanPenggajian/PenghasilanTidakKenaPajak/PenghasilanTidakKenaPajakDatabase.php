<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PenghasilanTidakKenaPajakDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'ptkp',
            [
                'no_ptkp'    => T::ID(20),
                'kode_ptkp'  => T::CODE(5),
                'perkawinan' => T::TEXT(),
                'tanggungan' => T::QTY(0, 3),
                'nilai_ptkp' => T::MONEY(),
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

<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PenghasilanTidakKenaPajak;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenghasilanTidakKenaPajakModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenghasilanTidakKenaPajakDatabase(),
            'BASE',
            'penggajian',
            'ptkp',
            'no_ptkp',
            [
                'no_ptkp'    => V::DEFAULT(),
                'kode_ptkp'  => V::DEFAULT(),
                'perkawinan' => V::DEFAULT(),
                'tanggungan' => V::DEFAULT(),
                'nilai_ptkp' => V::DEFAULT(),
            ],
            [],
        );
    }
}

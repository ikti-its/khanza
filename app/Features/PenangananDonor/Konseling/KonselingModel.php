<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KonselingModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new KonselingDatabase(),
            'BASE',
            'penanganan_donor',
            'konseling',
            'id_konseling',
            [
                'id_konseling'      => V::DEFAULT(),
                'tanggal_konseling' => V::DEFAULT()
            ],
            [
                'id_kasus'      => [''],
                'id_petugas'    => ['']
            ],
        );
    }
}
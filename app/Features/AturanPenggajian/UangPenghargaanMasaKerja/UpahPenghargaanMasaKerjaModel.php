<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UangPenghargaanMasaKerja;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class UpahPenghargaanMasaKerjaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new UpahPenghargaanMasaKerjaDatabase(),
            'BASE',
            'penggajian',
            'upmk',
            'no_upmk',
            [
                'no_upmk'       => V::DEFAULT(),
                'masa_kerja'   => V::DEFAULT(),
                'pengali_upah' => V::DEFAULT(),
            ],           
            [],
        );
    }
}
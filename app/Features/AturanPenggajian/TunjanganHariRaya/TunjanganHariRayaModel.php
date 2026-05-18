<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\TunjanganHariRaya;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TunjanganHariRayaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new TunjanganHariRayaDatabase(),
            'BASE',
            'penggajian',
            'thr',
            'no_thr',
            [
                'no_thr'       => V::DEFAULT(),
                'masa_kerja'   => V::DEFAULT(),
                'pengali_upah' => V::DEFAULT(),
            ],
            [],
        );
    }
}
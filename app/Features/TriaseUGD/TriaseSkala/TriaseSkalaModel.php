<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriaseSkalaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'triase_skala',
            'id_skala',
            [
                'id_skala' => V::TODO(),
                'id_tingkat_skala' => V::TODO(),
                'kode_skala' => V::TODO(),
                'id_pemeriksaan' => V::TODO(),
                'pengkajian' => V::TODO()
            ],
        );
    }
}
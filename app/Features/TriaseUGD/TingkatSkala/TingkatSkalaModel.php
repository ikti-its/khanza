<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TingkatSkalaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'tingkat_skala',
            'id_tingkat',
            [
                'id_tingkat' => V::TODO(),
                'nama_tingkat' => V::TODO()
            ],
        );
    }
}
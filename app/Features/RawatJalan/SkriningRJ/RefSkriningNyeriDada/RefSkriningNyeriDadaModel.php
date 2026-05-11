<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningNyeriDada;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefSkriningNyeriDadaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_nyeri_dada',
            'id_nyeri_dada',
            [
                'id_nyeri_dada' => V::TODO(),
                'nyeri_dada' => V::TODO(),
            ],
        );
    }
}
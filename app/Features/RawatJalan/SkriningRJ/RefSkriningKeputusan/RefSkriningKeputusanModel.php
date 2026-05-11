<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefSkriningKeputusanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_keputusan',
            'id_keputusan',
            [
                'id_keputusan' => V::TODO(),
                'skrining_keputusan' => V::TODO(),
            ],
        );
    }
}
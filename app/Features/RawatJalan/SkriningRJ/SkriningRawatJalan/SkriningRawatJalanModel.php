<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SkriningRawatJalanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'skrining_rj',
            'skrining_rawat_jalan',
            'id_skrining',
            [
                'id_skrining' => V::TODO(),
                'no_rm' => V::TODO(),
                'tgl_jam_skrining' => V::TODO(),
                'id_kesadaran' => V::TODO(),
                'id_pernafasan' => V::TODO(),
                'id_skala_nyeri' => V::TODO(),
                'id_nyeri_dada' => V::TODO(),
                'id_batuk' => V::TODO(),
                'is_geriatri' => V::TODO(),
                'is_risiko_jatuh' => V::TODO(),
                'id_keputusan' => V::TODO(),
                'id_petugas' => V::TODO(),
            ],
        );
    }
}
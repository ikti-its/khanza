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
            new SkriningRawatJalanDatabase(),
            'BASE',
            'skrining_rj',
            'skrining_rawat_jalan',
            'id_skrining',
            [
                'id_skrining'      => V::DEFAULT(),
                'no_rm'            => V::DEFAULT(),
                'tgl_jam_skrining' => V::DEFAULT(),
                'id_kesadaran'     => V::DEFAULT(),
                'id_pernafasan'    => V::DEFAULT(),
                'id_skala_nyeri'   => V::DEFAULT(),
                'id_nyeri_dada'    => V::DEFAULT(),
                'id_batuk'         => V::DEFAULT(),
                'is_geriatri'      => V::DEFAULT(),
                'is_risiko_jatuh'  => V::DEFAULT(),
                'id_keputusan'     => V::DEFAULT(),
                'id_petugas'       => V::DEFAULT(),
            ],
            [
                'id_kesadaran'   => ['kesadaran'],
                'id_pernafasan'  => ['pernafasan'],
                'id_skala_nyeri' => ['skala_nyeri'],
                'id_nyeri_dada'  => ['nyeri_dada'],
                'id_batuk'       => ['kategori_batuk'],
                'id_keputusan'   => ['skrining_keputusan'],
                'id_petugas'     => [],
            ],
        );
    }
}

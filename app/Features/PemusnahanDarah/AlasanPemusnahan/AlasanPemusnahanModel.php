<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AlasanPemusnahanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new AlasanPemusnahanDatabase(),
            'REFS',
            'pemusnahan_darah',
            'alasan_pemusnahan',
            'id_alasan',
            [
                'id_alasan'   => V::DEFAULT(),
                'nama_alasan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

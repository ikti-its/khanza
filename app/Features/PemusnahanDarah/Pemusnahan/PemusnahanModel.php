<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemusnahanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PemusnahanDatabase(),
            'BASE',
            'pemusnahan_darah',
            'pemusnahan',
            'id_pemusnahan',
            [
                'id_pemusnahan'      => V::DEFAULT(),
                'tanggal_pemusnahan' => V::DEFAULT(),
                'keterangan'         => V::DEFAULT(),
            ],
            [
                'id_petugas' => [''],
            ],
        );
    }
}

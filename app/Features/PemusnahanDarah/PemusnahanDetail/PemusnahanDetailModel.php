<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemusnahanDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PemusnahanDetailDatabase(),
            [
                'id_pemusnahan_detail' => V::DEFAULT(),
            ],
            [
                'id_pemusnahan' => ['tanggal_pemusnahan'],
                'id_stok_darah' => ['no_kantong', 'tanggal_pengambilan', 'tanggal_kadaluarsa'],
                'id_alasan'     => ['nama_alasan'],
            ],
        );
    }
}

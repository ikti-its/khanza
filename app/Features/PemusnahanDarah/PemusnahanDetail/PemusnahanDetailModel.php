<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemusnahanDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'pemusnahan_darah',
            'pemusnahan_detail',
            'id_pemusnahan_detail',
            [
                'id_pemusnahan_detail' => V::TODO(),
                'id_pemusnahan' => V::TODO(),
                'id_stok_darah' => V::TODO(),
                'id_alasan' => V::TODO()
            ],
        );
    }
}
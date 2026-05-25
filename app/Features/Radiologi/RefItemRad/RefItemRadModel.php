<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefItemRad;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefItemRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefItemRadDatabase(),
            'REFS',
            'radiologi',
            'ref_item_rad',
            'id_item',
            [
                'id_item'          => V::DEFAULT(),
                'kode_periksa'     => V::DEFAULT(),
                'nama_pemeriksaan' => V::DEFAULT(),
                'tarif_dasar'      => V::DEFAULT(),
            ],
            [],
        );
    }
}

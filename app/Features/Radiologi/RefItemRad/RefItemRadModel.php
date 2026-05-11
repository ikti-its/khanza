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
            'REFS',
            'radiologi',
            'ref_item_rad',
            'id_item',
            [
                'id_item' => V::TODO(),
                'kode_periksa' => V::TODO(),
                'nama_pemeriksaan' => V::TODO(),
                'tarif_dasar' => V::TODO(),
            ],
        );
    }
}
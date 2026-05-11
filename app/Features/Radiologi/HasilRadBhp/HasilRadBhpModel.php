<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilRadBhpModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'hasil_rad_bhp',
            'id_rad_bhp',
            [
                'id_rad_bhp' => V::TODO(),
                'id_hasil_rad' => V::TODO(),
                'id_barang_medis' => V::TODO(),
                'jumlah_pakai' => V::TODO(),
                'satuan' => V::TODO(),
                'harga_satuan' => V::TODO(),
            ],
        );
    }
}
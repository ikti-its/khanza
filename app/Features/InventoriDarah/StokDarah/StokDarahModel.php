<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StokDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'stok_darah',
            'id_stok_darah',
            [
                'id_stok_darah' => V::TODO(),
                'no_kantong' => V::TODO(),
                'id_komponen' => V::TODO(),
                'id_golongan_darah' => V::TODO(),
                'id_rhesus' => V::TODO(),
                'tanggal_pengambilan' => V::TODO(),
                'tanggal_kadaluarsa' => V::TODO(),
                'id_sumber_darah' => V::TODO(),
                'id_status_stok' => V::TODO()
            ],
        );
    }
}
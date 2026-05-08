<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemisahanKomponenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'pemisahan_komponen',
            'id_pemisahan',
            [
                'id_pemisahan' => V::TODO(),
                'id_bag' => V::TODO(),
                'tanggal_pemisahan' => V::TODO(),
                'id_shift' => V::TODO(),
                'id_petugas' => V::TODO()
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TarifKomponenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'tarif_komponen',
            'id_tarif',
            [
                'id_tarif' => V::TODO(),
                'id_komponen' => V::TODO(),
                'jasa_sarana' => V::TODO(),
                'paket_bhp' => V::TODO(),
                'kso' => V::TODO(),
                'manajemen' => V::TODO(),
                'pembatalan' => V::TODO(),
                'tanggal_berlaku' => V::TODO()
            ],
        );
    }
}
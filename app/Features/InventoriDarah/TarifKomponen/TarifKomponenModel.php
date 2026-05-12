<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TarifKomponenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new TarifKomponenDatabase(),
            'BASE',
            'inventori_darah',
            'tarif_komponen',
            'id_tarif',
            [
                'id_tarif'          => V::DEFAULT(),
                'jasa_sarana'       => V::DEFAULT(),
                'paket_bhp'         => V::DEFAULT(),
                'kso'               => V::DEFAULT(),
                'manajemen'         => V::DEFAULT(),
                'pembatalan'        => V::DEFAULT(),
                'tanggal_berlaku'   => V::DEFAULT()
            ],
            [
                'id_komponen'   => ['kode_komponen', 'nama_komponen', 'masa_berlaku_hari']
            ],
        );
    }
}
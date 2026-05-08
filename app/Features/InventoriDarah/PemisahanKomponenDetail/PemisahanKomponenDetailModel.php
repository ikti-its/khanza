<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponenDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemisahanKomponenDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'pemisahan_komponen_detail',
            'id_pemisahan_detail',
            [
                'id_pemisahan_detail' => V::TODO(),
                'id_pemisahan' => V::TODO(),
                'no_kantong' => V::TODO(),
                'id_komponen' => V::TODO(),
                'tanggal_kadaluarsa' => V::TODO()
            ],
        );
    }
}
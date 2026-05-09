<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\LokasiPenyimpanan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class LokasiPenyimpananModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new LokasiPenyimpananDatabase(),
            'REFS',
            'inventori_non_medis',
            'lokasi_penyimpanan',
            'id_lokasi_penyimpanan',
            [
                'id_lokasi_penyimpanan'   => V::DEFAULT(),
                'nama_lokasi_penyimpanan' => V::DEFAULT(),
            ],
            [],
        );
    }
}
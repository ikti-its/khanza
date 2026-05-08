<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StokOpnameDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'stok_opname_detail',
            'id_detail',
            [
                'id_detail' => V::TODO(),
                'id_opname' => V::TODO(),
                'id_barang' => V::TODO(),
                'stok_sistem' => V::TODO(),
                'stok_fisik' => V::TODO(),
                'selisih' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}

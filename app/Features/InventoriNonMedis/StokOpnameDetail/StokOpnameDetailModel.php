<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StokOpnameDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new StokOpnameDetailDatabase(),
            'BASE',
            'inventori_non_medis',
            'stok_opname_detail',
            'id_detail',
            [
                'id_detail'   => V::DEFAULT(),
                'stok_sistem' => V::TODO(),
                'stok_fisik'  => V::TODO(),
                'selisih'     => V::TODO(),
                'keterangan'  => V::TODO(),
            ],
            [
                'id_barang' => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}

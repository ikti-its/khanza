<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarangDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenerimaanBarangDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'penerimaan_barang_detail',
            'id_detail',
            [
                'id_detail' => V::TODO(),
                'id_penerimaan' => V::TODO(),
                'id_barang' => V::TODO(),
                'qty_diterima' => V::TODO(),
                'harga_satuan' => V::TODO(),
            ],
        );
    }
}

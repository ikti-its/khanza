<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'permintaan_barang_detail',
            'id_detail',
            [
                'id_detail' => V::TODO(),
                'id_permintaan' => V::TODO(),
                'id_barang' => V::TODO(),
                'nama_barang_baru' => V::TODO(),
                'qty' => V::TODO(),
                'qty_disetujui' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}

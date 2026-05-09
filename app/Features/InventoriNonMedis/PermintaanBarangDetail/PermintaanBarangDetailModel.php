<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PermintaanBarangDetailDatabase(),
            'BASE',
            'inventori_non_medis',
            'permintaan_barang_detail',
            'id_detail',
            [
                'id_detail'        => V::DEFAULT(),
                'nama_barang_baru' => V::DEFAULT(),
                'qty'              => V::TODO(),
                'qty_disetujui'    => V::TODO(),
                'catatan'          => V::TODO(),
            ],
            [
                'id_barang' => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}

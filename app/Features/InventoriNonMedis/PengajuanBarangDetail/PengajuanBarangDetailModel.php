<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengajuanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'pengajuan_barang_detail',
            'id_detail',
            [
                'id_detail' => V::TODO(),
                'id_pengajuan' => V::TODO(),
                'id_barang' => V::TODO(),
                'nama_barang_baru' => V::TODO(),
                'qty' => V::TODO(),
                'harga_estimasi' => V::TODO(),
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarangDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengadaanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PengadaanBarangDetailDatabase(),
            'BASE',
            'inventori_non_medis',
            'pengadaan_barang_detail',
            'id_detail',
            [
                'id_detail'    => V::DEFAULT(),
                'qty'          => V::TODO(),
                'harga_satuan' => V::TODO(),
            ],
            [
                'id_barang' => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}

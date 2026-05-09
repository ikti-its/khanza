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
            new PenerimaanBarangDetailDatabase(),
            'BASE',
            'inventori_non_medis',
            'penerimaan_barang_detail',
            'id_detail',
            [
                'id_detail'    => V::DEFAULT(),
                'qty_diterima' => V::TODO(),
                'harga_satuan' => V::TODO(),
            ],
            [
                'id_penerimaan' => ['tanggal', 'status'],
                'id_barang'     => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}

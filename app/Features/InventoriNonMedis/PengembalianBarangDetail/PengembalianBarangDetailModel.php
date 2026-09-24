<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarangDetail;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengembalianBarangDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengembalianBarangDetailDatabase(),
            [
                'id_detail'        => V::DEFAULT(),
                'qty_diajukan'     => V::DEFAULT(),
                'qty_diverifikasi' => V::DEFAULT(),
                'catatan'          => V::DEFAULT(),
            ],
            [
                'id_pengembalian' => [
                    'no_pengembalian',
                ],
                'id_barang'       => [
                    'kode_barang',
                    'nama_barang',
                    'id_satuan' => ['nama_satuan'],
                ],
            ],
        );
    }
}

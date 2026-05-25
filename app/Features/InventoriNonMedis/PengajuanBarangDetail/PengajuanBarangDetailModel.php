<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengajuanBarangDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengajuanBarangDetailDatabase(),
            'BASE',
            'inventori_non_medis',
            'pengajuan_barang_detail',
            'id_detail',
            [
                'id_detail'        => V::DEFAULT(),
                'id_pengajuan'     => V::DEFAULT(),
                'id_barang'        => V::DEFAULT(),
                'nama_barang_baru' => V::DEFAULT(),
                'qty'              => V::DEFAULT(),
                'harga_estimasi'   => V::DEFAULT(),
            ],
            [
                'id_pengajuan' => [
                    'tanggal',
                    'id_status_pengajuan_barang' => ['nama_status_pengajuan_barang'],
                ],
                'id_barang' => [
                    'nama_barang',
                    'kode_barang',
                    'id_satuan' => ['nama_satuan'],
                ],
            ],
        );
    }
}

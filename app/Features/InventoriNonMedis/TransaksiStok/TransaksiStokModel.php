<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TransaksiStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'transaksi_stok',
            'id_transaksi',
            [
                'id_transaksi' => V::TODO(),
                'id_barang' => V::TODO(),
                'tipe_transaksi' => V::TODO(),
                'qty' => V::TODO(),
                'tanggal' => V::TODO(),
                'id_pengadaan' => V::TODO(),
                'id_permintaan' => V::TODO(),
                'id_opname' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}

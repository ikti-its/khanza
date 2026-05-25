<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TransaksiStokModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TransaksiStokDatabase(),
            'BASE',
            'inventori_non_medis',
            'transaksi_stok',
            'id_transaksi',
            [
                'id_transaksi'           => V::DEFAULT(),
                'id_tipe_transaksi_stok' => V::DEFAULT(),
                'qty'                    => V::DEFAULT(),
                'tanggal'                => V::DEFAULT(),
                'catatan'                => V::DEFAULT(),
            ],
            [
                'id_barang'              => ['kode_barang', 'nama_barang'],
                'id_tipe_transaksi_stok' => ['nama_tipe_transaksi_stok'],
                'id_pengadaan'           => ['tanggal', 'status'],
                'id_permintaan'          => ['id_tipe_permintaan_barang', 'tanggal'],
                'id_opname'              => ['tanggal', 'id_status_stok_opname'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TransaksiStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new TransaksiStokDatabase(),
            'BASE',
            'inventori_non_medis',
            'transaksi_stok',
            'id_transaksi',
            [
                'id_transaksi'   => V::DEFAULT(),
                'tipe_transaksi' => V::TODO(),
                'qty'            => V::TODO(),
                'tanggal'        => V::TODO(),
                'catatan'        => V::TODO(),
            ],
            [
                'id_barang' => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}

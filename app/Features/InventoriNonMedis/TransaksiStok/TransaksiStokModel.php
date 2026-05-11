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
                'tipe_transaksi' => V::DEFAULT(),
                'qty'            => V::DEFAULT(),
                'tanggal'        => V::DEFAULT(),
                'catatan'        => V::DEFAULT(),
            ],
            [
                'id_barang'     => ['kode_barang', 'nama_barang'],
                'id_pengadaan'  => ['tanggal', 'status'],
                'id_permintaan' => ['tipe', 'tanggal'],
                'id_opname'     => ['tanggal', 'status'],
            ],
        );
    }
}

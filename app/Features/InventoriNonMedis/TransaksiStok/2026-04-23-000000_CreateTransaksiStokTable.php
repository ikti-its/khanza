<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateTransaksiStokTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'transaksi_stok',
            [
                'id_transaksi'   => T::ID32(),
                'id_barang'      => T::INT32(),
                'tipe_transaksi' => T::TEXT(),
                'qty'            => T::F64(),
                'tanggal'        => T::DATETIME(),
                'id_pengadaan'   => T::INT32()->nullable(),
                'id_permintaan'  => T::INT32()->nullable(),
                'catatan'        => T::TEXT()->nullable(),
            ],
            ['id_transaksi'],
            [],
            [
                [['id_barang'],     'barang',            ['id_barang'],     'CASCADE', 'RESTRICT'],
                [['id_pengadaan'],  'pengadaan_barang',  ['id_pengadaan'],  'CASCADE', 'SET NULL'],
                [['id_permintaan'], 'permintaan_barang', ['id_permintaan'], 'CASCADE', 'SET NULL'],
            ],
            [
                ['tanggal'],
                ['tipe_transaksi'],
            ],
            true,
            __DIR__ . '/transaksi_stok.csv'
        );
    }
}

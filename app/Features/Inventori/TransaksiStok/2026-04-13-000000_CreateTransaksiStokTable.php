<?php
declare(strict_types=1);

namespace App\Features\Inventori\TransaksiStok;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateTransaksiStokTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'transaksi_stok',
            [
                'id_transaksi'   => T::ID32(),
                'id_barang'      => T::ID32(),
                'tipe_transaksi' => T::TEXT(), 
                'qty'            => T::F64(),
                'tanggal'        => T::DATETIME(),
            ],
            ['id_transaksi'],
            [],
            [
                [['id_barang'], 'barang', ['id_barang'], 'CASCADE', 'RESTRICT'],
            ],
            [
                ['tanggal'],
                ['tipe_transaksi']
            ],
            true,
            __DIR__ . '/transaksi_stok.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class TransaksiStokDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'transaksi_stok',
            [
                'id_transaksi'   => T::ID32(1_000_000),
                'id_barang'      => T::FK_AUTO(),
                'tipe_transaksi' => T::TEXT(),
                'qty'            => T::F64(),
                'tanggal'        => T::DATETIME(),
                'id_pengadaan'   => T::FK_AUTO()->nullable(),
                'id_permintaan'  => T::FK_AUTO()->nullable(),
                'id_opname'      => T::FK_AUTO()->nullable(),
                'catatan'        => T::TEXT()->nullable(),
            ],
            'id_transaksi',
            [],
            [
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
                [
                    'id_pengadaan',
                    \App\Features\InventoriNonMedis\PengadaanBarang\PengadaanBarangDatabase::class,
                    'id_pengadaan',
                ],
                [
                    'id_permintaan',
                    \App\Features\InventoriNonMedis\PermintaanBarang\PermintaanBarangDatabase::class,
                    'id_permintaan',
                ],
                [
                    'id_opname',
                    \App\Features\InventoriNonMedis\StokOpname\StokOpnameDatabase::class,
                    'id_opname',
                ],
            ],
            true,
            __DIR__ . '/transaksi_stok.csv'
        );
    }
}

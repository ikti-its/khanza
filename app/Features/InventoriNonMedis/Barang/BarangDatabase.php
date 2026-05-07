<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class BarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'barang',
            [
                'id_barang'             => T::ID16(2_000),
                'kode_barang'           => T::TEXT(),
                'nama_barang'           => T::TEXT(),
                'id_kategori'           => T::FK_AUTO(),
                'id_suplier'            => T::FK_AUTO(),
                'id_satuan'             => T::FK_AUTO(),
                'id_lokasi_penyimpanan' => T::FK_AUTO(),
                'stok'                  => T::F64(),
                'stok_minimum'          => T::F64()->nullable(),
                'harga_satuan'          => T::F64()->nullable(),
            ],
            'id_barang',
            ['kode_barang'],
            [
                [
                    'id_kategori',
                    \App\Features\InventoriNonMedis\KategoriBarang\KategoriBarangDatabase::class,
                    'id_kategori',
                ],
                [
                    'id_suplier',
                    \App\Features\InventoriNonMedis\Suplier\SuplierDatabase::class,
                    'id_suplier',
                ],
                [
                    'id_satuan',
                    \App\Features\InventoriNonMedis\Satuan\SatuanDatabase::class,
                    'id_satuan',
                ],
                [
                    'id_lokasi_penyimpanan',
                    \App\Features\InventoriNonMedis\LokasiPenyimpanan\LokasiPenyimpananDatabase::class,
                    'id_lokasi_penyimpanan',
                ],
            ],
            true,
            'barang.csv'
        );
    }
}

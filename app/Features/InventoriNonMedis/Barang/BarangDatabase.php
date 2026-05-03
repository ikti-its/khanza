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
                'id_barang'       => T::ID16(2_000),
                'kode_barang'     => T::TEXT(),
                'nama_barang'     => T::TEXT(),
                'id_jenis_barang'       => T::FK_AUTO(),

                'id_kategori'           => T::FK_AUTO(),
                'id_supplier'           => T::FK_AUTO()->nullable(),
                'id_satuan'             => T::FK_AUTO(),
                'id_lokasi_penyimpanan' => T::FK_AUTO(),

                'stok'         => T::F64(),
                'stok_minimum' => T::F64()->nullable(),
                'harga_satuan' => T::F64()->nullable(),
            ],
            'id_barang',
            'kode_barang',
            [
                ['id_jenis_barang', 'jenis_barang', 'id_jenis_barang'],
                ['id_kategori', 'kategori_barang', 'id_kategori'],
                ['id_supplier', 'supplier', 'id_supplier'],
                ['id_satuan', 'satuan', 'id_satuan'],
                ['id_lokasi_penyimpanan', 'lokasi_penyimpanan', 'id_lokasi_penyimpanan'],
            ],
            true,
            __DIR__ . '/barang.csv'
        );
    }
}

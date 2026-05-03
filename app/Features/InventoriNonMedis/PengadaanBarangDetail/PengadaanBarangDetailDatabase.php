<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarangDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PengadaanBarangDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengadaan_barang_detail',
            [
                'id_detail'     => T::ID32(250_000),
                'id_pengadaan'  => T::FK_AUTO(),
                'id_barang'     => T::FK_AUTO(),
                'qty'           => T::F64(),
                'harga_satuan'  => T::F64()->nullable(),
            ],
            'id_detail',
            [],
            [
                ['id_pengadaan', 'pengadaan_barang', 'id_pengadaan'],
                ['id_barang', 'barang', 'id_barang'],
            ],
            true,
            __DIR__ . '/pengadaan_barang_detail.csv'
        );
    }
}

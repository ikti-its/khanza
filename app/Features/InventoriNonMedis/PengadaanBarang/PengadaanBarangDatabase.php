<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PengadaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengadaan_barang',
            [
                'id_pengadaan'  => T::ID32(50_000),
                'id_pengajuan'  => T::FK_AUTO(),
                'id_supplier'   => T::FK_AUTO(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
                'catatan'       => T::TEXT()->nullable(),
            ],
            'id_pengadaan',
            [],
            [
                [
                    'id_pengajuan',
                    \App\Features\InventoriNonMedis\PengajuanBarang\PengajuanBarangDatabase::class,
                    'id_pengajuan',
                ],
                [
                    'id_supplier',
                    \App\Features\InventoriNonMedis\Supplier\SupplierDatabase::class,
                    'id_supplier',
                ],
            ],
            true,
            __DIR__ . '/pengadaan_barang.csv'
        );
    }
}

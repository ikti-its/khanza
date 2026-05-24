<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PermintaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'permintaan_barang',
            [
                'id_permintaan'              => T::ID(100_000),
                'id_unit'                    => T::FK_AUTO(),
                'id_tipe_permintaan_barang'  => T::FK_AUTO(),
                'tanggal'                    => T::DTIME(),
                'id_status_permintaan_barang' => T::FK_AUTO(),
                'catatan'                    => T::NOTE()->nullable(),
            ],
            'id_permintaan',
            [],
            [
                [
                    'id_unit',
                    \App\Features\InventoriNonMedis\Unit\UnitDatabase::class,
                    'id_unit',
                ],
                [
                    'id_tipe_permintaan_barang',
                    \App\Features\InventoriNonMedis\TipePermintaanBarang\TipePermintaanBarangDatabase::class,
                    'id_tipe_permintaan_barang',
                ],
                [
                    'id_status_permintaan_barang',
                    \App\Features\InventoriNonMedis\StatusPermintaanBarang\StatusPermintaanBarangDatabase::class,
                    'id_status_permintaan_barang',
                ],
            ],
            true,
            'permintaan_barang.csv'
        );
    }
}

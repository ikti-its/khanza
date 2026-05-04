<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PermintaanBarangDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'permintaan_barang_detail',
            [
                'id_detail'       => T::ID32(500_000),
                'id_permintaan'   => T::FK_AUTO(),
                'id_barang'       => T::FK_AUTO(),
                'nama_barang_baru'=> T::TEXT()->nullable(),
                'qty'             => T::F64(),
                'qty_disetujui'   => T::F64()->nullable(),
                'catatan'         => T::TEXT()->nullable(),
            ],
            'id_detail',
            [],
            [
                [
                    'id_permintaan',
                    \App\Features\InventoriNonMedis\PermintaanBarang\PermintaanBarangDatabase::class,
                    'id_permintaan',
                ],
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
            ],
            true,
            'permintaan_barang_detail.csv'
        );
    }
}

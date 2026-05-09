<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PengajuanBarangDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengajuan_barang_detail',
            [
                'id_detail'       => T::ID32(500_000),
                'id_pengajuan'    => T::FK_AUTO(),
                'id_barang'       => T::FK_AUTO(),
                'nama_barang_baru'=> T::NAME()->nullable(),
                'qty'             => T::F64(),
                'harga_estimasi'  => T::F64()->nullable(),
            ],
            'id_detail',
            [],
            [
                [
                    'id_pengajuan',
                    \App\Features\InventoriNonMedis\PengajuanBarang\PengajuanBarangDatabase::class,
                    'id_pengajuan',
                ],
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
            ],
            true,
            'pengajuan_barang_detail.csv'
        );
    }
}

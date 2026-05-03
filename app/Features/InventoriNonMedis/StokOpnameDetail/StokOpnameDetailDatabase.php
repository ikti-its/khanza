<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class StokOpnameDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'stok_opname_detail',
            [
                'id_detail'   => T::ID32(),
                'id_opname'   => T::FK_AUTO(),
                'id_barang'   => T::FK_AUTO(),
                'stok_sistem' => T::F64(),
                'stok_fisik'  => T::F64(),
                'selisih'     => T::F64(),
                'keterangan'  => T::TEXT()->nullable(),
            ],
            'id_detail',
            [],
            [
                ['id_opname', 'stok_opname', 'id_opname'],
                ['id_barang', 'barang', 'id_barang'],
            ],
            true,
            __DIR__ . '/stok_opname_detail.csv'
        );
    }
}

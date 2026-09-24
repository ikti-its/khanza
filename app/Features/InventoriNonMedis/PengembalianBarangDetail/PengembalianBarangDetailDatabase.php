<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarangDetail;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PengembalianBarangDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengembalian_barang_detail',
            [
                'id_detail'        => T::ID(500_000),
                'id_pengembalian'  => T::FK_AUTO(),
                'id_barang'        => T::FK_AUTO(),
                'qty_diajukan'     => T::QTY(0, 100_000),
                'qty_diverifikasi' => T::QTY(0, 100_000)->nullable(),
                'catatan'          => T::NOTE()->nullable(),
            ],
            'id_detail',
            [],
            [
                [
                    'id_pengembalian',
                    \App\Features\InventoriNonMedis\PengembalianBarang\PengembalianBarangDatabase::class,
                    'id_pengembalian',
                ],
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
            ],
            true,
            'pengembalian_barang_detail.csv',
        );
    }
}

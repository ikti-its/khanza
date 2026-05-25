<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarangDetail;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PenerimaanBarangDetailDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'penerimaan_barang_detail',
            [
                'id_detail'     => T::ID(50_000),
                'id_penerimaan' => T::FK_AUTO(),
                'id_barang'     => T::FK_AUTO(),
                'qty_diterima'  => T::QTY(0, 100_000),
                'harga_satuan'  => T::MONEY()->nullable(),
            ],
            'id_detail',
            [],
            [
                [
                    'id_penerimaan',
                    \App\Features\InventoriNonMedis\PenerimaanBarang\PenerimaanBarangDatabase::class,
                    'id_penerimaan',
                ],
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
            ],
            true,
            'penerimaan_barang_detail.csv',
        );
    }
}

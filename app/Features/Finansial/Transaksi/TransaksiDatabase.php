<?php
declare(strict_types=1);

namespace App\Features\Finansial\Transaksi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TransaksiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'finansial',
            'transaksi',
            [
                'id_transaksi'      => T::ID(1_000_000_000),
                'waktu_transaksi'   => T::DTIME(),
                'rekening_sumber'   => T::FK_AUTO(),
                'rekening_tujuan'   => T::FK_AUTO(),
                'nominal'           => T::MONEY(),
                'metode_pembayaran' => T::FK_AUTO(),
            ],
            'id_transaksi',
            [
                ['waktu_transaksi', 'rekening_sumber', 'rekening_tujuan'],
            ],
            [
                [
                    'rekening_sumber',
                    \App\Features\Finansial\Rekening\RekeningDatabase::class,
                    'id_rekening',
                ],
                [
                    'rekening_tujuan',
                    \App\Features\Finansial\Rekening\RekeningDatabase::class,
                    'id_rekening',
                ],
                [
                    'metode_pembayaran',
                    \App\Features\Finansial\MetodePembayaran\MetodePembayaranDatabase::class,
                    'id_metode',
                ],
            ],
        );
    }
}

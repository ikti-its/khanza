<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TarifKomponenDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_darah',
            'tarif_komponen',
            [
                'id_tarif'        => T::ID(1_000_000),
                'id_komponen'     => T::FK_AUTO(),
                'jasa_sarana'     => T::MONEY(),
                'paket_bhp'       => T::MONEY(),
                'kso'             => T::MONEY(),
                'manajemen'       => T::MONEY(),
                'pembatalan'      => T::MONEY(),
                'tanggal_berlaku' => T::DATE(),
            ],
            'id_tarif',
            [['id_komponen', 'tanggal_berlaku']],
            [
                [
                    'id_komponen',
                    \App\Features\Darah\KomponenDarah\KomponenDarahDatabase::class,
                    'id_komponen',
                ],
            ],
            false,
            'tarif_komponen.csv',
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponenDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemisahanKomponenDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'pemisahan_komponen_detail',
            [
                'id_pemisahan_detail'      => T::ID32(300_000_000),
                'id_pemisahan'             => T::FK_AUTO(),
                'no_kantong'               => T::TEXT(),
                'id_komponen'              => T::FK_AUTO(),
                'tanggal_kadaluarsa'       => T::DATE(),
            ],
            'id_pemisahan_detail',
            ['no_kantong'],
            [
                [
                    'id_pemisahan', 
                    \App\Features\InventoriDarah\PemisahanKomponen\PemisahanKomponenDatabase::class, 
                    'id_pemisahan'
                ],
                [
                    'id_komponen', 
                    \App\Features\Darah\KomponenDarah\KomponenDarahDatabase::class, 
                    'id_komponen'
                ],
            ],
            false,
            'pemisahan_komponen_detail.csv'
        );
    }
}

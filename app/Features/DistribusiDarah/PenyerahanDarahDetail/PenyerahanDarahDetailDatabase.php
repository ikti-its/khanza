<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenyerahanDarahDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'penyerahan_darah_detail',
            [
                'id_penyerahan_detail'     => T::ID32(100_000_000),
                'id_penyerahan'            => T::FK_AUTO(),
                'id_stok_darah'            => T::FK_AUTO(),
                'jasa_sarana'              => T::F32(),
                'paket_bhp'                => T::F32(),
                'kso'                      => T::F32(),
                'manajemen'                => T::F32(),
                // 'total'                    => T::F32(),
            ],
            'id_penyerahan_detail',
            ['id_stok_darah'],
            [
                [
                    'id_penyerahan', 
                    \App\Features\DistribusiDarah\PenyerahanDarah\PenyerahanDarahDatabase::class, 
                    'id_penyerahan'
                ],
                [
                    'id_stok_darah', 
                    \App\Features\InventoriDarah\StokDarah\StokDarahDatabase::class, 
                    'id_stok_darah'
                ],
            ],
            false,
            'penyerahan_darah_detail.csv'
        );
    }
}

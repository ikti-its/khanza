<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemusnahanDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan_darah',
            'pemusnahan_detail',
            [
                'id_pemusnahan_detail' => T::ID32(30_000_000),
                'id_pemusnahan'        => T::FK_AUTO(),
                'id_stok_darah'        => T::FK_AUTO(),
                'id_alasan'            => T::FK_AUTO(),
            ],
            'id_pemusnahan_detail',
            ['id_stok_darah'],
            [
                [
                    'id_pemusnahan', 
                    \App\Features\PemusnahanDarah\Pemusnahan\PemusnahanDatabase::class, 
                    'id_pemusnahan'
                ],
                [
                    'id_stok_darah', 
                    \App\Features\InventoriDarah\StokDarah\StokDarahDatabase::class, 
                    'id_stok_darah'
                ],
                [
                    'id_alasan', 
                    \App\Features\PemusnahanDarah\AlasanPemusnahan\AlasanPemusnahanDatabase::class, 
                    'id_alasan'
                ],
            ],
            false,
            'pemusnahan_detail.csv'
        );
    }
}

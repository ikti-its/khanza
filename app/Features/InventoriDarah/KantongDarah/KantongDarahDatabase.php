<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class KantongDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'kantong_darah',
            [
                'id_bag'                   => T::ID32(100_000_000),
                'id_pengambilan_darah'     => T::FK_AUTO(),
                'no_bag'                   => T::TEXT(),
                'id_jenis_bag'             => T::FK_AUTO(),
            ],
            'id_bag',
            ['id_pengambilan_darah', 'no_bag'],
            [
                [
                    'id_pengambilan_darah', 
                    \App\Features\Donor\PengambilanDarah\PengambilanDarahDatabase::class, 
                    'id_pengambilan_darah'
                ],
                [
                    'id_jenis_bag', 
                    \App\Features\InventoriDarah\JenisBag\JenisBagDatabase::class, 
                    'id_jenis_bag'
                ],
            ],
            false,
            'kantong_darah.csv'
        );
    }
}

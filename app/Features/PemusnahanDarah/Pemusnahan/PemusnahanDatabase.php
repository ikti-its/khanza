<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemusnahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan_darah',
            'pemusnahan',
            [
                'id_pemusnahan'      => T::ID(5_000_000),
                'tanggal_pemusnahan' => T::DATE(),
                'id_petugas'         => T::FK_AUTO(),
                'keterangan'         => T::TEXT()->nullable(),
            ],
            'id_pemusnahan',
            [],
            [
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'pemusnahan.csv'
        );
    }
}

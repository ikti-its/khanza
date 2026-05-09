<?php
declare(strict_types=1);

namespace App\Features\Role\Petugas;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PetugasDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'role',
            'petugas',
            [
                'id_petugas' => T::ID32(1_000_000),
                'id_orang'   => T::FK_AUTO(),
                'deskripsi'  => T::TEXT(),
            ],
            'id_petugas',
            [],
            [
                [
                    'id_orang', 
                    \App\Features\Person\Orang\OrangDatabase::class, 
                    'id_orang'
                ],
            ],
            false,
            'petugas.csv'
        );
    }
}

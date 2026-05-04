<?php
declare(strict_types=1);

namespace App\Features\Role\Dokter;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class DokterDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'role',
            'dokter',
            [
                'id_dokter'  => T::ID32(1_000_000),
                'id_orang'   => T::FK_AUTO(),
                'spesialis'  => T::TEXT(),
            ],
            'id_dokter',
            [
                ['id_orang', 'spesialis']
            ],
            [
                [
                    'id_orang', 
                    \App\Features\Person\Orang\OrangDatabase::class, 
                    'id_orang'
                ],
            ],
        );
    }
}

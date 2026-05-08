<?php
declare(strict_types=1);

namespace App\Features\Role\Pasien;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PasienDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'role',
            'pasien',
            [
                'id_pasien'  => T::ID32(1_000_000),
                'id_orang'   => T::FK_AUTO(),
                'nomor_rm'   => T::TEXT(),
            ],
            'id_pasien',
            [
                'id_orang',
                'nomor_rm'
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

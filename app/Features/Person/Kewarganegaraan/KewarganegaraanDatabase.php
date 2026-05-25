<?php
declare(strict_types=1);

namespace App\Features\Person\Kewarganegaraan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class KewarganegaraanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'person',
            'kewarganegaraan',
            [
                'id_kewarganegaraan' => T::ID(200),
                'id_negara'          => T::FK_AUTO(),
            ],
            'id_kewarganegaraan',
            [],
            [
                [
                    'id_negara',
                    \App\Features\Lokasi\Negara\NegaraDatabase::class,
                    'id_negara',
                ],
            ],
        );
    }
}

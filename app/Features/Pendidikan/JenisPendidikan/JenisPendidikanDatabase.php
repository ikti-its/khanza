<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\JenisPendidikan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisPendidikanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'pendidikan',
            'jenis',
            [
                'id_jenis'   => T::ID(9),
                'nama_jenis' => T::TEXT(),
                'id_jenjang' => T::FK_AUTO(),
            ],
            'id_jenis',
            ['nama_jenis'],
            [
                [
                    'id_jenjang',
                    \App\Features\Pendidikan\JenjangPendidikan\JenjangPendidikanDatabase::class,
                    'id_jenjang',
                ],
            ],
        );
    }
}

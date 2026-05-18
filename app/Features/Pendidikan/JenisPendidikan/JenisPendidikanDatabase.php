<?php

namespace App\Features\Pendidikan\JenisPendidikan;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisPendidikanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'jenis_pendidikan',
            [
                'id_jenis_pendidikan'   => T::ID(9),
                'nama_jenis_pendidikan' => T::TEXT(),
                'jenjang_pendidikan_id' => T::FK_AUTO(),
                
            ],
            'id_jenis_pendidikan',
            ['nama_jenis_pendidikan'],
            [
                [
                    'jenjang_pendidikan_id', 
                    \App\Features\Pendidikan\JenjangPendidikan\JenjangPendidikanDatabase::class, 
                    'id_jenjang_pendidikan',
                ],
            ],
        );
    }
}

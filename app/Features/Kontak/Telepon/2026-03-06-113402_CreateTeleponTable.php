<?php

namespace App\Features\Kontak\Telepon;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateTeleponTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'telepon',
            [
                'id_telepon'    => T::ID32(),
                'id_orang'      => T::ID32(),
                'nomor_telepon' => T::TEXT(),
                'jenis_telepon' => T::ID8(),
            ],
            ['id_telepon'],
            [['nomor_telepon']],
            [
                [['id_orang'], 'person.orang', ['id_orang'], 'CASCADE', 'CASCADE'],
                [['jenis_telepon'], 'jenis_telepon', ['id_jenis_telepon'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

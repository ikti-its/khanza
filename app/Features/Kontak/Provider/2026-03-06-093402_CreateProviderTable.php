<?php

namespace App\Features\Kontak\Provider;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreateProviderTable extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'provider',
            [
                'id_provider'   => T::ID8(),
                'nama_provider' => T::TEXT(),
            ],
            ['id_provider'],
            [['nama_provider']],
            [],
            [],
        );
    }
}

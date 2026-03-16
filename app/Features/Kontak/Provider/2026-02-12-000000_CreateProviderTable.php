<?php
declare(strict_types=1);

namespace App\Features\Kontak\Provider;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateProviderTable extends DatabaseTemplate
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

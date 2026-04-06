<?php
declare(strict_types=1);

namespace App\Features\Kontak\Provider;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateProviderTable extends Template
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

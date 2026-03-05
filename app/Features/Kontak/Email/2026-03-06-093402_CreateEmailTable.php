<?php

namespace App\Features\Kontak\Email;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateEmailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'email',
            [
                'id_email'     => T::ID32(),
                'id_orang'     => T::ID32(),
                'alamat_email' => T::TEXT(),
            ],
            ['id_email'],
            [['alamat_email']],
            [
                [['id_orang'], 'person.orang', ['id_orang'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}

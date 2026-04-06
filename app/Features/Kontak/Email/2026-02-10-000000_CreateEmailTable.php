<?php
declare(strict_types=1);

namespace App\Features\Kontak\Email;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateEmailTable extends Template
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

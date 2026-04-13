<?php
declare(strict_types=1);

namespace App\Features\Kontak\Email;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateEmailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'email',
            [
                'id_email'     => T::ID32(),
                'id_orang'     => T::INT32(),
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

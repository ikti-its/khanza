<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateAuthTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'auth',
            'akun',
            [
                'id'       => T::UUID(),
                'email'    => T::TEXT(),
                'password' => T::TEXT(),
                'role'     => T::INT32(),
            ],
            'id',
            'email',
            [],
            true,
            __DIR__ . '/auth.csv'
        );
    }
}

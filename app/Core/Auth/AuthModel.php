<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AuthModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new AuthDatabase(),
            [
                'id'       => V::DEFAULT(),
                'email'    => V::DEFAULT(),
                'password' => V::DEFAULT(),
                'role'     => V::DEFAULT(),
            ],
            [],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\ModelTemplate;

final class AuthModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'auth',
            'akun',
            'id',
            [
                'id' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'email' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'password' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'role' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
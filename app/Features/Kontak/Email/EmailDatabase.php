<?php
declare(strict_types=1);

namespace App\Features\Kontak\Email;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class EmailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'email',
            [
                'id_email' => T::ID(300_000_000),
                'id_orang' => T::FK_AUTO(),
                'email'    => T::TEXT(),
            ],
            'id_email',
            ['email'],
            [
                [
                    'id_orang',
                    \App\Features\Person\Orang\OrangDatabase::class,
                    'id_orang',
                ]
            ],
        );
    }
}

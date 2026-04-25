<?php
declare(strict_types=1);

namespace App\Features\Finansial\PemilikBank;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePemilikBankTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'pemilik_bank',
            [
                'id'      => T::ID8(),
                'pemilik' => T::TEXT(),
            ],
            ['id'],
            [['pemilik']],
            [],
            true,
            __DIR__ . '/pemilik_bank.csv'
        );
    }
}

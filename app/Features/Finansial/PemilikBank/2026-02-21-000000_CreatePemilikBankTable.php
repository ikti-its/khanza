<?php
declare(strict_types=1);

namespace App\Features\Finansial\PemilikBank;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePemilikBankTable extends Template
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
            [],
            true,
            __DIR__ . '/pemilik_bank.csv'
        );
    }
}

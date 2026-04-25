<?php
declare(strict_types=1);

namespace App\Features\Finansial\PrinsipBank;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePrinsipBankTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'prinsip_bank',
            [
                'id'      => T::ID8(),
                'prinsip' => T::TEXT(),
            ],
            ['id'],
            [['prinsip']],
            [],
            true,
            __DIR__ . '/prinsip_bank.csv'
        );
    }
}

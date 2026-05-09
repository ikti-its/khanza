<?php
declare(strict_types=1);

namespace App\Features\Finansial\PemilikBank;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemilikBankDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'pemilik_bank',
            [
                'id'      => T::ID8(5),
                'pemilik' => T::TEXT(),
            ],
            'id',
            ['pemilik'],
            [],
            true,
            'pemilik_bank.csv'
        );
    }
}

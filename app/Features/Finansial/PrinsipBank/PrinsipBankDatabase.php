<?php
declare(strict_types=1);

namespace App\Features\Finansial\PrinsipBank;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PrinsipBankDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'prinsip_bank',
            [
                'id'      => T::ID(4),
                'prinsip' => T::TEXT(),
            ],
            'id',
            ['prinsip'],
            [],
            true,
            'prinsip_bank.csv'
        );
    }
}

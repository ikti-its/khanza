<?php
declare(strict_types=1);

namespace App\Features\Finansial\PemilikBank;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemilikBankDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'pemilik_bank',
            [
                'id'      => T::ID(5),
                'pemilik' => T::NAME(40),
            ],
            'id',
            ['pemilik'],
            [],
            true,
            'pemilik_bank.csv'
        );
    }
}

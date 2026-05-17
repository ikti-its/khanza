<?php
declare(strict_types=1);

namespace App\Features\Finansial\Bank;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class BankDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'bank',
            [
                'id_bank'        => T::ID(100),
                'kode_bank'      => T::CODE(3)->nullable(),
                'nama_bank'      => T::NAME(50)->nullable(),
                'sebutan'        => T::NAME(10)->nullable(),
                'pemilik_id'     => T::FK_AUTO(),
                'prinsip_id'     => T::FK_AUTO(),
                'is_bank_devisa' => T::BOOL()->nullable(),
                'mobile_app'     => T::TEXT(),
                'link_playstore' => T::TEXT(),

            ],
            'id_bank',
            [
                'kode_bank',
                'nama_bank'
            ],
            [
                [
                    'pemilik_id', 
                    \App\Features\Finansial\PemilikBank\PemilikBankDatabase::class, 
                    'id',
                ],
                [
                    'prinsip_id', 
                    \App\Features\Finansial\PrinsipBank\PrinsipBankDatabase::class, 
                    'id',
                ],
            ],
            true,
            'bank.csv'
        );
    }
}

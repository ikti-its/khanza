<?php
declare(strict_types=1);

namespace App\Features\Finansial\Rekening;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RekeningDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'rekening',
            [
                'id_rekening'    => T::ID32(10_000_000),
                'bank'           => T::FK_AUTO(),       
                'nomor_rekening' => T::TEXT(),
            ],
            'id_rekening',
            ['nomor_rekening'],
            [
                [
                    'bank',
                    \App\Features\Finansial\Bank\BankDatabase::class,
                    'id_bank'
                ]
            ],
        );
    }
}

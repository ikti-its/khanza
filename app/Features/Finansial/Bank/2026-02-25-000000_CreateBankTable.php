<?php
declare(strict_types=1);

namespace App\Features\Finansial\Bank;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateBankTable extends Template
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'bank',
            [
                'id'             => T::ID8(),
                'kode'           => T::INT16()->nullable(),
                'nama'           => T::TEXT()->nullable(),
                'sebutan'        => T::TEXT()->nullable(),
                'pemilik_id'     => T::ID8(),
                'prinsip_id'     => T::ID8(),
                'is_bank_devisa' => T::BOOL()->nullable(),
                'mobile_app'     => T::TEXT(),
                'link_playstore' => T::TEXT(),

            ],
            ['id'],
            [['nama']],
            [
                [['pemilik_id'], 'pemilik_bank', ['id'], 'CASCADE', 'CASCADE'],
                [['prinsip_id'], 'prinsip_bank', ['id'], 'CASCADE', 'CASCADE'],
            ],
            [],
            true,
            __DIR__ . '/bank.csv'
        );
    }
}

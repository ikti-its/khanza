<?php
declare(strict_types=1);

namespace App\Features\Finansial\Bank;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateBankTable extends DatabaseTemplate
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
                'pemilik_id'     => T::INT8(),
                'prinsip_id'     => T::INT8(),
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
